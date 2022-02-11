<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class InstallController extends Controller
{
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            "name" => ["bail", "required", "string", "regex:/^([a-z0-9\x{0621}-\x{064A}àâçéèêëîïôûùüÿñæœ. _'-]){3,50}$/iu"],
            "email" => ["bail", "required", "string", "regex:/^[a-z_.-]+\@[a-z-]+\.{1}[a-z]{2,4}(.[a-z]{2,4})?$/i", Rule::unique(User::class)],
            "password" => ["bail", "required", "confirmed", Password::min(8)->letters()->numbers()->uncompromised()],
        ]);

        if ($validation->fails()) {
            return response($validation->errors()->toJson(), Response::HTTP_BAD_REQUEST);
        }
        // all ok
        $admin = new User;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->email = $request->email;
        $admin->account_level = UserService::ACCOUNT_LEVEL_ADMIN;
        $admin->save();

        $settings = new UserSetting;
        $settings->user_id = $admin->id;

        Auth::login($admin);

        return response("admin created", Response::HTTP_CREATED);
    }

    /**
     * Check if an admin account can be created or not by checking if the User table is empty or not
     */
    public function canInstall()
    {
        $userServices = new UserService;

        if (!$userServices->isFirstUserCreated()) {
            // only allow if table is empty
            return response("ok", Response::HTTP_OK);
        } else {
            return response("cannot", Response::HTTP_FORBIDDEN);
        }
    }
}
