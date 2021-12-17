<?php

namespace Tests\Feature;

use App\Models\Town;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TownCRUDTest extends TestCase
{
    use DatabaseTransactions;


    private function getLoggedUser()
    {
        $user = User::factory()->create([
            'name' => 'admin_test',
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        return $this->withHeader("Accept", "application/json")->actingAs($user);
    }
    public function testPostTownReturnCreatedAndJsonWhenRequestIsValid()
    {
        $wilaya = Wilaya::create([
            "code" => 1000,
            "name" => "test wilaya",
            "ar_name" => "ولاية"
        ]);
        $data = [
            "wilayaId" => $wilaya->id,
            "name" => 'test new town',
            "arName" => "بلدية"
        ];
        $loggedUser = $this->getLoggedUser();
        $response = $loggedUser->post("/api/towns", $data);
        // var_dump($response);

        $response->assertCreated()->assertJson([
            "wilayaId" => $data["wilayaId"],
            "name" => $data["name"],
            "arName" => $data["arName"],
            "protected" => false,
        ]);
    }

    public function testPatchTownReturnOkWhenRequestIsValid()
    {
        $townName = "test town";
        $arTownName = "بلدبة";
        // create a temporary town
        $wilaya = Wilaya::create([
            "code" => 1000,
            "name" => "test wilaya",
            "ar_name" => "ولاية"

        ]);

        $town = Town::create([
            "wilaya_id" => $wilaya->id,
            "name" => $townName,
            "ar_name" => $arTownName,
            "code" => 1000001,
            "protected" => false,
        ]);

        $newTownName = "test town modified";
        $newTownArName = "تغير";
        $data = [
            "wilayaId" => $wilaya->id,
            // "name" => $newTownName,
            "arName" => $newTownArName
        ];

        $response = $this->getLoggedUser()->patch("/api/towns/" . $town->id, $data);

        $response->assertOk()->assertJson([
            "id" => $town->id, // created id
            "name" => $town->name, // the name that the town had upon creation
            "arName" => $newTownArName, // the new name
            "code" => 1000001, // created code
            "protected" => false, // created property
            "wilayaId" => $wilaya->id // the created wilaya id
        ]);
    }
}
