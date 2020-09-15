<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Carousel extends JsonResource
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
            'errCode' => 0,
            'errMsg' => '',
            'data' => $this->resource,
        ];
    }
}
