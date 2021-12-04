<?php

namespace Tests\Unit;

use App\Models\Schedule;
use App\Services\ScheduleService;
use Exception;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ScheduleServiceTest extends TestCase
{
    private $validSchedule = [
        "sunday" => [
            [
                "from" => [
                    "hours" => 6,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 10,
                    "minutes" => 00
                ]
            ]
        ],
        "monday" => [
            [
                "from" => [
                    "hours" => null,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "tuesday" => [
            [
                "from" => [
                    "hours" => 8,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 16,
                    "minutes" => 00
                ]
            ]
        ],
        "wednesday" => [
            [
                "from" => [
                    "hours" => null,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "thursday" => [
            [
                "from" => [
                    "hours" => 10,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 16,
                    "minutes" => 30
                ]
            ]
        ],
        "friday" => [
            [
                "from" => [
                    "hours" => null,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "saturday" => [
            [
                "from" => [
                    "hours" => 6,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 17,
                    "minutes" => 00
                ]
            ]
        ]
    ];

    private $invalidSchedule = [
        "sunday" => [
            [
                "from" => [
                    "hours" => 6,
                    "minutes" => 90
                ],
                "to" => [
                    "hours" => 10,
                    "minutes" => 00
                ]
            ]
        ],
        "monday" => [
            [
                "from" => [
                    "hours" => null,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "tuesday" => [
            [
                "from" => [
                    "hours" => 8,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 5,
                    "minutes" => 30
                ]
            ]
        ],
        "wednesday" => [
            [
                "from" => [
                    "hours" => null,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "thursday" => [
            [
                "from" => [
                    "hours" => 10,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 16,
                    "minutes" => 30
                ]
            ]
        ],
        "friday" => [
            [
                "from" => [
                    "hours" => 5,
                    "minutes" => null
                ],
                "to" => [
                    "hours" => null,
                    "minutes" => null
                ]
            ]
        ],
        "saturday" => [
            [
                "from" => [
                    "hours" => 6,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 17,
                    "minutes" => 00
                ]
            ]
        ]
    ];

    /**
     * @group ValidateTime()
     * @covers ScheduleService::validateTime()
     */
    public function testValidateTimeReturnTrueWhenTimeValuesAreCorrect()
    {
        $time = [
            "hours" => 10,
            "minutes" => 30,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateTime($time));
    }
    /**
     * @group ValidateTime()
     * @covers ScheduleService::validateTime()
     */
    public function testValidateTimeReturnTrueWhenTimeValuesAreNull()
    {
        $time = [
            "hours" => null,
            "minutes" => null,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateTime($time));
    }
    /**
     * @group ValidateTime()
     * @covers ScheduleService::validateTime()
     */
    public function testValidateTimeReturnFalseWhenTimeValuesAreIcorrect()
    {
        $time = [
            "hours" => 33,
            "minutes" => 100,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateTime($time));
    }

    /**
     * @group ValidateTime()
     * @covers ScheduleService::validateTime()
     */
    public function testValidateTimeReturnFalseWhenTimeValuesAreOfIncorrectType()
    {
        $time = [
            "hours" => "test",
            "minutes" => false,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateTime($time));
    }

    public function testValidateReturnFalseTimeWhenInputIsNotArray()
    {
        $time = "test";
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateTime($time));
    }


    // isTimeAGreaterThanB
    /**
     * @covers ScheduleService::isTimeAGreaterThanB()
     */
    public function testIsTimeAGreaterThanBReturnTrueWhenInputIsValid()
    {
        $timeA = [
            "hours" => 22,
            "minutes" => 0
        ];
        $timeB = [
            "hours" => 10,
            "minutes" => 55
        ];
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->isTimeAGreaterThanB($timeA, $timeB));
    }
    /**
     * @covers ScheduleService::isTimeAGreaterThanB()
     */
    public function testIsTimeAGreaterThanBReturnFalseWhenInputIsInvalid()
    {
        $timeA = [
            "hours" => 10,
            "minutes" => 0
        ];
        $timeB = [
            "hours" => 22,
            "minutes" => 55
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->isTimeAGreaterThanB($timeA, $timeB));
    }
    /**
     * @covers ScheduleService::isTimeAGreaterThanB()
     */
    public function testIsTimeAGreaterReturnsFalseWhenBothTimesAreEqual()
    {
        $timeA = [
            "hours" => 10,
            "minutes" => 55
        ];
        $timeB = [
            "hours" => 10,
            "minutes" => 55
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->isTimeAGreaterThanB($timeA, $timeB));
    }

    // validatePeriod
    /**
     * @covers ScheduleService::validatePeriod()
     */
    public function testValidatePeriodReturnsTrueWhenInputIsValid()
    {
        $period = [
            "from" => [
                "hours" => 10,
                "minutes" => 55
            ],
            "to" => [
                "hours" => 11,
                "minutes" => 55
            ],
        ];

        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validatePeriod($period));
    }
    /**
     * @covers ScheduleService::validatePeriod()
     */
    public function testValidatePeriodReturnsFalseWhenFromAndToHaveEqualTime()
    {
        $period = [
            "from" => [
                "hours" => 10,
                "minutes" => 55
            ],
            "to" => [
                "hours" => 10,
                "minutes" => 55
            ]
        ];

        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validatePeriod($period));
    }
    /**
     * @covers ScheduleService::validatePeriod()
     */
    public function testValidatePeriodReturnsFalseWhenFromIsGreaterThanTo()
    {
        $period = [
            "from" => [
                "hours" => 10,
                "minutes" => 56
            ],
            "to" => [
                "hours" => 10,
                "minutes" => 55
            ],
        ];

        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validatePeriod($period));
    }
    /**
     * @covers ScheduleService::validateDay()
     */
    public function testValidateDayReturnsTrueWhenInputIsValid()
    {
        $day = [
            [
                "from" => [
                    "hours" => 10,
                    "minutes" => 55
                ],
                "to" => [
                    "hours" => 23,
                    "minutes" => 40
                ]
            ]
        ];


        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateDay($day));
    }
    /**
     * @covers ScheduleService::validateDay()
     */
    public function testValidateDayReturnsTrueWhenInputIsValidWithMultiplePeriods()
    {
        $day = [
            [
                "from" => [
                    "hours" => 10,
                    "minutes" => 55
                ],
                "to" => [
                    "hours" => 18,
                    "minutes" => 40
                ]
            ],
            [
                "from" => [
                    "hours" => 19,
                    "minutes" => 00
                ],
                "to" => [
                    "hours" => 23,
                    "minutes" => 40
                ]
            ]
        ];


        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateDay($day));
    }

    /**
     * @covers ScheduleService::validateDay()
     */
    public function testValidateDayReturnsFalseWhenInputValuesIsInvalid()
    {
        $day = [
            [
                "from" => [
                    "hours" => 10,
                    "minutes" => 55
                ],
                "to" => [
                    "hours" => 8,
                    "minutes" => 10
                ]
            ]
        ];


        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateDay($day));
    }
    /**
     * @covers ScheduleService::validateDay()
     */
    public function testValidateDayReturnsFalseWhenMultiplePeriodAndTheSecondPeriodTimeIsBeforeTheFirst()
    {
        $day = [
            [
                "from" => [
                    "hours" => 6,
                    "minutes" => 30
                ],
                "to" => [
                    "hours" => 10,
                    "minutes" => 00
                ]
            ],
            [
                "from" => [
                    "hours" => 9,
                    "minutes" => 55
                ],
                "to" => [
                    "hours" => 22,
                    "minutes" => 00
                ]
            ]
        ];

        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateDay($day));
    }

    // validate schedule
    /**
     * @covers ScheduleService::validateSchedule()
     */
    public function testValidateScheduleReturnsTrueWhenInputIsValid()
    {
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateSchedule($this->validSchedule));
    }

    public function testValidateScheduleReturnsFalseWhenInputIsInvalid()
    {
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateSchedule($this->invalidSchedule));
    }

    // validateScheduleRequest
    /**
     * @covers ScheduleService::validateSingleScheduleRequest()
     */
    public function testValidateScheduleRequestReturnsTrueWhenInputIsValid()
    {
        $request = [
            "method" => "post",
            "data" => $this->validSchedule,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateSingleScheduleRequest($request));
    }
    /**
     * @covers ScheduleService::validateSingleScheduleRequest()
     */
    public function testValidateScheduleRequestReturnsTrueWhenInputIsValidPatchRequest()
    {
        $request = [
            "method" => "patch",
            "data" => $this->validSchedule,
            "scheduleCode" => 123456789

        ];
        $scheduleServices = new ScheduleService();

        $this->assertTrue($scheduleServices->validateSingleScheduleRequest($request));
    }
    /**
     * @covers ScheduleService::validateSingleScheduleRequest()
     */
    public function testvalidateScheduleRequestReturnsFalseWhenScheduleIsInvalid()
    {
        $request = [
            "method" => "post",
            "data" => $this->invalidSchedule,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateSingleScheduleRequest($request));
    }
    /**
     * @covers ScheduleService::validateSingleScheduleRequest()
     */
    public function testvalidateScheduleRequestReturnsFalseWhenRequestIsPatchAndScheduleCodeIsMissing()
    {
        $request = [
            "method" => "patch",
            "data" => $this->validSchedule,
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateSingleScheduleRequest($request));
    }
    /**
     * @covers ScheduleService::validateSingleScheduleRequest()
     */
    public function testvalidateScheduleRequestReturnsFalseWhenRequestMethodIsInvalid()
    {
        $request = [
            "method" => "get",
            "data" => $this->validSchedule,
            "scheduleCode" => 1234567
        ];
        $scheduleServices = new ScheduleService();

        $this->assertFalse($scheduleServices->validateSingleScheduleRequest($request));
    }

    /**
     * @covers ScheduleService::prepareScheduleModels()
     */
    public function testvalidateScheduleRequestReturnsAnArrayOfModelsWhenRequestIsValid()
    {
        $request = [
            "townCode" => 16002, // valid wilaya code
            "current" => [
                "method" => "post",
                "data" => $this->validSchedule,
            ],
            "next" => [
                "method" => "post",
                "data" => null
            ]
        ];
        $scheduleServices = new ScheduleService();

        $results = $scheduleServices->prepareScheduleModels($request);
        var_dump($results);
        $this->assertArrayHasKey("current", $results);
        $this->assertArrayHasKey("next", $results);
        $this->assertCount(2, $results, "array is expected to have 2 elements only");
        foreach ($results as $model) {
            $this->assertInstanceOf(Schedule::class, $model);
        }
    }
    /**
     * @covers ScheduleService::prepareScheduleModels()
     */
    public function testvalidateScheduleRequestThrowExceptionWhenDataIsInvalid()
    {
        $request = [
            "townCode" => 16002, // valid wilaya code
            "current" => [
                "method" => "post",
                "data" => $this->invalidSchedule,
            ],
            "next" => [
                "method" =>  "post",
                "data" => $this->invalidSchedule,
            ]
        ];
        $scheduleServices = new ScheduleService();


        $this->expectExceptionMessage("invalid request");
        $scheduleServices->prepareScheduleModels($request);
    }

    // more test for prepareScheduleModels() with temporary db insertion
}
