<?php

namespace App\Http\Resources;

use App\Services\ScheduleService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ScheduleResource extends JsonResource
{

    private $is_next_week = false;

    function __construct($resource, $is_next_week = false)
    {
        parent::__construct($resource);
        $this->is_next_week = $is_next_week;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $scheduleServices = new ScheduleService;

        return [
            // 'id' => $this->id,
            'year' => $this->year,
            'townCode' => $this->town_code,
            'weekStart' => $this->when(!Auth::check(), $this->is_next_week ? $scheduleServices->getNextWeekStartDate() : $scheduleServices->getCurrentWeekStartDate()),
            'weekEnd' =>  $this->when(!Auth::check(), $this->is_next_week ? $scheduleServices->getNextWeekEndDate() : $scheduleServices->getCurrentWeekEndDate()),
            'scheduleCode' => $this->code,
            'weekNumber' => $this->week_number,
            'nextWeekNumber' =>  $this->when(Auth::check(), $this->next_week_number),
            'schedule' => $this->schedule == null ? null : json_decode($this->schedule)
        ];
    }
}
