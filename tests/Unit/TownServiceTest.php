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

        $result = $townService->checkTownExistance($name, $arTown, 16);
        $this->assertTrue($result);
    }

    public function testCheckIfBothTownNamesExistReturnsFalseWhenEntryDoesNotExist()
    {
        $townService = new TownService;
        $name = "London";
        $arTown =  "لندن";
        $result = $townService->checkTownExistance($name, $arTown, 16);
        $this->assertFalse($result);
    }
}
