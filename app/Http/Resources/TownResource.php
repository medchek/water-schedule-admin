<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TownResource extends JsonResource
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
            'name' => $this->name,
            'arName' => $this->ar_name,
            'code' => $this->code,
            'protected' => $this->when(Auth::check(), $this->protected),

            'wilayaId' => $this->wilaya_id
        ];
    }
}
