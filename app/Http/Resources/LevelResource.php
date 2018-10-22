<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
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
            'number' => $this->number,
            'centimeter' => $this->centimeter,
            'time' => $this->created_at->format('H:i A'),
            'area_id' => $this->area_id
        ];
    }
}
