<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class UserProduct extends Model
{
    protected $table = 'user_product';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getProduct(){
        return $this->product;
    }

    public function setProduct(Product $product){
        $this->product_id = $product->getId();
    }
}
