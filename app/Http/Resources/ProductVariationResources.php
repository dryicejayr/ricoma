<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductVariationResource;

class ProductVariationResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try{
            $response = [];
            foreach($this->all() as $resource){
                $response[] = new ProductVariationResource($resource);         
            }

            return $response;
        }catch(\Exception $e){   
            report($e);
            throw new \Exception(config('messages.DEFAULT_ERROR'));
        }
    }
}
