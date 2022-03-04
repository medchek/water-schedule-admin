<?php

namespace Tests\Unit;

use App\Services\TownService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TownServiceTest extends TestCase
{
    use DatabaseTransactions;

    public function testGenerateTownCodeReturnsExpectedNumber()
    {
        $townService = new TownService;

        $code = $townService->generateTownCode(17, 5);
        $this->assertEquals(17005, $code);
    }

    public function testCheckTownExistanceReturnsTrueWhenEntryExists()
    {

        $townService = new TownService;
        $name = "djasr kasentina";
        $arTown = "جسر قسنطينة";

        $result = $townService->checkTownExistence($name, $arTown, 16);
        $this->assertTrue($result);
    }

    public function testCheckIfBothTownNamesExistReturnsFalseWhenEntryDoesNotExist()
    {
        $townService = new TownService;
        $name = "London";
        $arTown =  "لندن";
        $result = $townService->checkTownExistence($name, $arTown, 16);
        $this->assertFalse($result);
    }

    public function testCheckTownCodeExistanceReturnsTrueWhenAValidTownCodeIsProvided()
    {
        $townService = new TownService;
        // 16001 is a valid town code, 1 is not
        $validTownCode = 16001; // Alger-centre
        $result = $townService->checkTownCodeExistence($validTownCode);
        $this->assertTrue($result);
    }
    public function testCheckTownCodeExistanceReturnsFalseWhenAnInValidTownCodeIsProvided()
    {
        $townService = new TownService;
        // 16001 is a valid town code, 1 is not
        $invalidTownCode = 1; // none existant town code, refer to town seeders for a complete list
        $result = $townService->checkTownCodeExistence($invalidTownCode);
        $this->assertFalse($result);
    }
}
