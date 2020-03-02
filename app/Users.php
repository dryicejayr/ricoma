<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Product;
use App\UserProduct;
use Illuminate\Support\Facades\Hash;

class Users extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
        ,'updated_at'
        ,'id'
        ,'password'
    ];

    public function getId(){
        return $this->id;
    }

    public function getFullName(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName($value){
        $this->first_name = $value;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setLastName($value){
        $this->last_name = $value;
    }

    public function getUserName(){
        return $this->user_name;
    }

    public function setUserName($value){
        $this->user_name = $value;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        $this->email = $value;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($value){
        $this->password = Hash::make($value);
    }

    /** 
     * @return object collection
     */
    public function UserProductById($id){
        return $this->hasMany(UserProduct::class, 'user_id')->where('product_id', $id)->first();
    }

    /** 
     * @return array collection
     */
    public function UserProducts(){
        return $this->hasMany(UserProduct::class, 'user_id');
    }

    public function getUserProducts($id=null){
        if(!is_null($id)){
            return $this->UserProductById($id);
        }else{
            return $this->UserProducts;
        }
    }

    public function setUserProduct(Product $product){
        $userProduct = new UserProduct;
        $userProduct->user_id = $this->id;
        $userProduct->product_id = $product->getId();
        $userProduct->save();
    }

    /** JWT IMPLMENTATION */
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }
}
