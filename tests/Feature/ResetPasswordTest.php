<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * for the data to pass, the new password must be 8 chars miniumn, must contain both numbers and letters, must differ from the current one,
     * and must not be found in the leaked passwords db (using Illuminate\Validation\Rules\Password::uncompromised() rule)
     */
    public function testResetPasswordReturnsOkWhenCorrectDataIsReceived()
    {


        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        $data = [
            "current_password" => "password123", // correct
            "new_password" => "unqiuePassword1234@@__", // correct
            "new_password_confirmation" => "unqiuePassword1234@@__" // correct
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/reset-password", $data);

        $response->assertOk();
    }
    /** if the new password was compromised when validating, return a 400 with "leaked password" status text */
    public function testResetPasswordReturnsPasswordLeakedAsStatusMessageWhenNewPasswordIsFoundInCompromisedList()
    {


        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        $data = [
            "current_password" => "password123", // correct
            "new_password" => "password1234", // correct but leaked/compromised passwod
            "new_password_confirmation" => "password1234" // same as previous
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/reset-password", $data);

        $response->assertSeeText("leaked password")->assertStatus(400); // ok
    }

    public function testResetPasswordReturnForbiddenStatusWhenCurrentPasswordIsUncorrect()
    {

        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        $data = [
            "current_password" => "notCurrentPassword", // incorrect, expect current_password = password123
            "new_password" => "newpassword123", // correct
            "new_password_confirmation" => "newpassword123" // correct
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/reset-password", $data);

        $response->assertForbidden(); // 403 = forbidden
    }

    public function testResetPasswordReturnBadRequestStatusWhenNewPasswordIsInvalid()
    {

        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        $data = [
            "current_password" => "password123", // correct
            "new_password" => "newpassword", // must contain letters and number to be correct (and must be 8 in length or greater), hoverver, no numbers are included here.
            "new_password_confirmation" => "newpassword" // incorrect
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/reset-password", $data);

        $response->assertStatus(400); // 400 = bad request
    }
    /**
     * @test current password and new password must be different 
     */
    public function testResetPasswordReturnBadRequestStatusWhenNewPasswordIsIdenticalToTheCurrentPassword()
    {

        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        $data = [
            "current_password" => "password123", // correct
            "new_password" => "password", // must contain letters and number to be correct (and must be 8 in length or greater), hoverver, no numbers are included here.
            "new_password_confirmation" => "password" // incorrect
        ];

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->withHeader("Accept", "application/json")->actingAs($user)->patch("/api/settings/reset-password", $data);

        $response->assertStatus(400); // 400 = bad request
    }

    public function testResetPasswordShoudReturnUnauthorizedStatusWhenUserIsNotLogged()
    {
        $data = [
            "current_password" => "password123", // correct
            "new_password" => "newpassword123", // correct
            "new_password_confirmation" => "newpassword123" // correct
        ];
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])->patch("/api/settings/reset-password", $data);

        $response->assertUnauthorized(); // unautorized 401
    }
}
