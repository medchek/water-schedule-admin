<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class UserSettingsTest extends TestCase
{

    private function MockedLoggedInPostRequest(array $data): TestResponse
    {
        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->post("/api/settings/user-settings", $data);
        return $response;
    }
    private function MockedLoggedInPatchRequest(array $data): TestResponse
    {
        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        // create the user setttings
        UserSetting::create([
            "user_id" => $user->id,
            "wilaya_code" => 16,
            "town_code" => 16001,
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/user-settings", $data);
        return $response;
    }
    /**
     * @tests for storeUserSettings
     */

    public function testUserSettingsPostRequestShoudReturnOkStatusWhenDataIsValid()
    {

        $data = [
            "wilaya_code" => 16,
            "town_code" => 16001
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->MockedLoggedInPostRequest($data);

        $response->assertCreated()->assertJson([
            "wilayaCode" => 16,
            "townCode" => 16001
        ]);
    }


    public function testUserSettingsPostRequestShoudReturnBadRequestStatusWhenDataIsInvalid()
    {

        $data = [
            "wilaya_code" => 999, // wilaya 999 does not exist
            "town_code" => 16001 // valid
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response =  $this->MockedLoggedInPostRequest($data);

        $response->assertStatus(400); // Bad request = 400

    }
    /** test if town is related to the wilaya
     * @example - wilaya_code => 16(Alger), town_code => 16001(Alger-centre) = valid 
     * @example - wilaya_code => 16(Alger), town_code => 42014(Gouraya) = invalid because Gouraya belongs to Tipaza 
     */
    public function testUserSettingsPostRequestShoudReturnBadRequestIfDataIsValidButTownDoesNotBelongToWilaya()
    {

        $data = [
            "wilaya_code" => 16, // wilaya 999 does not exist
            "town_code" => 42014
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response =  $this->MockedLoggedInPostRequest($data);

        $response->assertStatus(400); // Bad request = 400

    }
    /**
     * test if the request return 403 (forbidden) when a post request is sent and the setting entry already exists in the database 
     * in which case the request must be a patch request
     */
    public function testUserSettingsPostRequestShoudReturnForbiddenIfPostRequestIsSentInsteadOfPatch()
    {

        $data = [
            "wilaya_code" => 16, // wilaya 999 does not exist
            "town_code" => 16001
        ];

        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);
        // create the user setttings
        UserSetting::create([
            "user_id" => $user->id,
            "wilaya_code" => 16,
            "town_code" => 16001,
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->post("/api/settings/user-settings", $data);

        $response->assertForbidden(); // 403

    }

    /**
     * @tests for updateUserAppSettings
     */

    public function testUserSettingsPatchRequestShoudReturnOkStatusWhenDataIsValid()
    {

        $patchData = [
            "wilaya_code" => 16, // Alger
            "town_code" => 16002 // new 16002 = Sidi M'hamed - currrent = 16001 (Alger-Centre) should be ok
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->MockedLoggedInPatchRequest($patchData);

        $response->assertOk()->assertJson([
            "wilayaCode" => 16,
            "townCode" => 16002
        ]);
    }

    public function testUserSettingsPatchRequestShoudReturnOkStatusWhenDataIsValidAndContainDifferentWilayaCodeAndTownCode()
    {

        $patchData = [
            "wilaya_code" => 1, // new 01 = Adrar - current 16 - Alger
            "town_code" => 1027 // new 1027 = Ouled Aïssa' - currrent = 16001 (Alger-Centre)
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->MockedLoggedInPatchRequest($patchData);

        $response->assertOk()->assertJson([
            "wilayaCode" => 1,
            "townCode" => 1027
        ]);
    }
    /**
     * when recived data values are valid but identical to the ones currently present in the database, a 422 should be returned and nothing is processed
     * This should not happen and is checked for client side, but a verification is required nonetheless
     */
    public function testUserSettingsPatchRequestShoudReturnUnprocessableEntityStatusWhenUnchangedDataIsReceived()
    {

        $patchData = [
            "wilaya_code" => 16, // same as currrent
            "town_code" => 16001 // same as current
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->MockedLoggedInPatchRequest($patchData);

        $response->assertUnprocessable(); // 422
    }
    public function testUserSettingsPatchRequestShoudReturnBadRequestStatusWhenRecivedDataIsInvalidOrMissing()
    {

        $patchData = [
            "wilaya_code" => 999, // invalid
            // missing town_code property
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->MockedLoggedInPatchRequest($patchData);

        $response->assertStatus(400); // 422
    }
    /** Test if the user recives a 403 fobidden when a patch request is called on a entity that does not exists, which should have been a post request */
    public function testUserSettingsPatchRequestShoudReturnNotFoundStatusWhenPatchedEntityDoesNotExistInDatabase()
    {

        $patchData = [
            "wilaya_code" => 16, // valid
            "town_code" => 16002 // valid
        ];

        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/user-settings", $patchData);

        $response->assertNotFound(); // 404
    }
}
