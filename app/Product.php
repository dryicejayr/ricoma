<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductVariation;
use App\Brand;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
        ,'updated_at'
        ,'deleted_at'
    ];

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($value){
        $this->description = $value;
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getBrand(){
        return $this->brand;
    }

    public function setBrand(Brand $brand){
        $this->brand_id = $brand->getId();
    }

    public function productVariations(){
        return $this->hasMany(ProductVariation::class, 'product_id');
    }

    public function getProductVariations(){
        return $this->productVariations;
    }

    public function ProductVariationByDefault($sku){
        $productVariation = $this->hasMany(ProductVariation::class, 'product_id');
        if(!is_null($sku)){
            $productVariation->where('sku', $sku);
        }

        return $productVariation->latest()->first();
    }

    public function getProductVariationByDefault($sku=null){
        return $this->ProductVariationByDefault($sku);
    }
}
