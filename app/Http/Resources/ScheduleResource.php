<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'id' => $this->id,
            'year' => $this->year,
            'townCode' => $this->town_code,
            'scheduleCode' => $this->code,
            // 'schedules' => [
            //     "current" => [
            //         'weekNumber' => ""
            //     ],
            // ],
            'weekNumber' => $this->week_number,
            'nextWeekNumber' => $this->next_week_number,
            'schedule' => json_decode($this->schedule)
        ];
    }
}
