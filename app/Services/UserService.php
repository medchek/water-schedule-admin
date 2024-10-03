<?php

namespace App\Services;

use App\Http\Resources\UserSettingsResource;
use App\Models\Town;
use App\Models\User;
use App\Models\UserSetting;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;


class UserService
{

    public const ACCOUNT_LEVEL_ADMIN = 2;
    public const ACCOUNT_LEVEL_SUBADMIN = 1;
    public const ACCOUNT_LEVEL_EDITOR = 0;

    /**
     * Updates the user password
     */
    public function resetUserPassword(array $data): Response
    {

        $leakedPasswordErrorMessage = "leaked password";

        $validator = Validator::make(
            $data,
            [
                "current_password" => "bail|required|current_password",
                "new_password" => ["bail", "required", "confirmed", "different:current_password", "string", Password::min(8)->letters()->numbers()->uncompromised()]
            ],
            [
                "new_password.password.uncompromised" => $leakedPasswordErrorMessage
            ]
        );


        if ($validator->fails()) {
            $failedRules = $validator->failed();
            // var_dump("failed rules =>", $validator->errors()->toArray());

            $isWrongCurrentPassword = isset($failedRules["current_password"]);

            // check if the leaked message exists in the validation error message for the new password
            $isPasswordLeaked = in_array($leakedPasswordErrorMessage, $validator->errors()->get("new_password"));


            // if the current password is incorrect send a 403 (forbidden)
            $errorStatusCode = $isWrongCurrentPassword
                ? 403 : 400;

            // response handling
            // initial default response error message
            $responseErrorMessage = "invalid data";


            if ($isWrongCurrentPassword) {
                $responseErrorMessage = "invalid password";
            }

            if ($isPasswordLeaked) {
                $responseErrorMessage = "leaked password";
            }
            // return the error response
            return response($responseErrorMessage, status: $errorStatusCode);
        }

        try {
            // if everything is ok, update the user password
            $user = User::find(Auth::id());

            $user->password = Hash::make($data["new_password"]);
            $user->save();

            // everthing is ok
            return response("", 200);
        } catch (Exception $err) {
            Log::channel("stderr")->error($err);
            return response("server error", 500);
        }
    }

    private function doUserSettingsExist(): bool
    {
        $currentUser = User::find(Auth::id());
        $doUserSettingsExist = $currentUser->settings;
        // if the settings are already set, a post request is forbidden
        return isset($doUserSettingsExist);
    }

    /**
     * Valides the user app settings that should contain the wilaya_code and town_code that the user wishes to use by default
     * @return string if error is encountered while validating, returns a string containing the error message. If the validation succeeds, returns an empty string
     */
    private function validateUserAppSettingsData(array $data): string
    {
        // firs validate the wilaya_code
        $wilayCodeValidator = Validator::make($data, [
            "wilaya_code" => "bail|required|filled|numeric|digits_between:1,58|exists:App\Models\Wilaya,id",
        ]);
        if ($wilayCodeValidator->fails()) {
            return "invalid wilaya_code";
        }
        // wilaya_code will now be correct
        $wilayaCode = $data["wilaya_code"];
        // validate the town_code now

        $townCodeValidator = Validator::make($data, [
            "town_code" =>  ["required", "filled", "numeric", "starts_with:" . $wilayaCode],
        ]);

        if ($townCodeValidator->fails()) {
            return "invalid town_code";
        }
        // wilaya_code will now be correct
        $townCode = $data["town_code"];
        // check if town belongs to the wilaya
        $town = Town::where("code", $townCode)->first();
        if (!isset($town)) {
            return "town does not exist";
        }
        // town exist now check if the town model wilaya_id matches the requested wilaya_code

        if ($town->wilaya_id !== $wilayaCode) {
            return "town does not belong to specified wilaya";
        }

        // if everthing was ok return an empty string
        return "";
    }
    /**
     * STORE REQUEST HANDLING
     */
    public function storeUserAppSettings(array $data): Response
    {
        // if the settings are already set, a post request is forbidden
        if ($this->doUserSettingsExist()) {
            return response("settings already exist, cannot store", 403);
        }



        $errorMessage = $this->validateUserAppSettingsData($data);
        if ($errorMessage !== "") {
            return response($errorMessage, 400);
        }


        // insert the user settings
        $userSettings = new UserSetting();

        $userSettings->wilaya_code = $data["wilaya_code"];
        $userSettings->town_code = $data["town_code"];
        $userSettings->user_id = Auth::id();

        $userSettings->save();

        // doesTownCodeBelongToWilaya
        return response(new UserSettingsResource($userSettings), 201);
    }


    /**
     * PATCH REQUEST HANDLING
     */
    public function updateUserAppSettings(array $data): Response
    {
        $currentUser = User::find(Auth::id());
        $userSettings = $currentUser->settings;



        // if the settings doe not exist, a patch request is forbidden
        if (!isset($userSettings)) {
            return response("settings don't exist, cannot patch", 404);
        }

        // quickly check if the values are the same and prevent any further checks that would require database access

        $initialValidation = Validator::make($data, [
            "wilaya_code" => ["required", "filled", "numeric", "digits_between:1,58"],
            "town_code" => ["required", "filled", "numeric", "min:1"]
        ]);

        if ($initialValidation->fails()) {
            return response("invalid data", 400);
        }

        $wilayaCode = $data["wilaya_code"];
        $townCode = $data["town_code"];

        // if no data should be changed cancel further validation
        if ($wilayaCode === $userSettings->wilaya_code && $townCode === $userSettings->town_code) {
            return response("nothing to change", 422);
        }

        // if the settings are not identical, thus being able to be patched, check for validity
        $errorMessage = $this->validateUserAppSettingsData($data);
        if ($errorMessage !== "") {
            return response($errorMessage, 400);
        }
        // only update data when it's different (patch)
        if ($userSettings->wilaya_code !== $wilayaCode) $userSettings->wilaya_code = $wilayaCode;
        if ($userSettings->town_code !== $townCode) $userSettings->town_code = $townCode;

        $userSettings->save();
        return response(new UserSettingsResource($userSettings), 200);
    }

    public function storeUserLang(string $data): Response
    {
        // if the settings are already set, a post request is forbidden
        if ($this->doUserSettingsExist()) {
            return response("settings already exist, cannot store", 403);
        }

        $validation = Validator::make($data, [
            'lang' => [
                'required',
                Rule::in(["fr", "ar"]),
            ],
        ]);

        if ($validation->fails()) {
            return response("invalid data", 400);
        }

        return response($data, 201);
    }
    /**
     * Checks whether the first user has been created or not (which should be the admin user).
     * Uses a indefinitly timed cache that will only reset when the admin account is created
     */
    public function isFirstUserCreated(): bool
    {
        $count = Cache::rememberForever("can-install", function () {
            return User::count();
        });
        return $count !== 0;
    }
}
