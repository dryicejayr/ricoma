<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Color;
use App\Size;
use App\Product;

class ProductVariation extends Model
{
    use SoftDeletes;

    protected $table = 'product_variation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
        ,'updated_at'
        ,'deleted_at'
        ,'color_id'
        ,'size_id'
        ,'brand_id'
    ];

    public function getId(){
        return $this->id;
    }

    public function getSKU(){
        return $this->sku;
    }

    public function setSKU($value){
        $this->sku = $value;
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getProduct(){
        return $this->product;
    }

    public function setProduct(Product $product){
        $this->product_id = $product->getId();
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor(Color $color){
        $this->color_id = $color->getId();
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function getSize(){
        return $this->size;
    }

    public function setSize(Size $size){
        $this->size_id = $size->getId();
    }

    /** SCOPE */
    public function scopeSKU($query, $value){
        return $query->where('sku', $value);
    }
}
