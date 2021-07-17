<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Town;
use App\Models\Wilaya;

class PeriodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $town = Town::find($this->town_id);
        $wilaya = Wilaya::find($town->wilaya_id);
        return [
            "id" => $this->id,
            "year" => $this->year,
            "weekFrom" => $this->week_start,
            "weekTo" => $this->week_end,
            "town" => $town->name,
            "wilaya" => $wilaya->name
        ];
    }
}
