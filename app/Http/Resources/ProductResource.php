<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductVariationResource;
use App\Http\Resources\ProductVariationResources;

class ProductResource extends JsonResource
{
    private $sku;
    
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $sku = null)
    {
        $this->sku = $sku;

        parent::__construct($resource);
    }
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $variations = $this->getProductVariations();
        $default_variation = $this->getProductVariationByDefault($this->sku);
        return [
            'id' => $this->getId()
            ,'name' => $this->getName()
            ,'description' => $this->getDescription()
            ,'brand' => new BrandResource($this->getBrand())
            ,'default_variation' => new ProductVariationResource($default_variation)
            ,'variations' => new ProductVariationResources($variations)
        ];
    }
}
