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
            'id' => $this->id,
            'sunday' => [
                'from' => $this->sunday_from,
                'to' => $this->sunday_to
            ],
            'monday' => [
                'from' => $this->monday_from,
                'to' => $this->monday_to
            ],
            'tuesday' => [
                'from' => $this->tuesday_from,
                'to' => $this->tuesday_to
            ],
            'wednesday' => [
                'from' => $this->wednesday_from,
                'to' => $this->wednesday_to
            ],
            'thrusday' => [
                'from' => $this->thrusday_from,
                'to' => $this->thrusday_to
            ],
            'friday' => [
                'from' => $this->friday_from,
                'to' => $this->friday_to
            ],
        ];
    }
}
