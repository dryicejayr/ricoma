<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SizeResource;
use App\Http\Resources\ColorResource;

class ProductVariationResource extends JsonResource
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
            'sku' => $this->getSKU()
            ,'size' => new SizeResource($this->getSize())
            ,'color' => new ColorResource($this->getColor())
        ];
    }
}
