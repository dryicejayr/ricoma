<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'created_at'
        ,'updated_at'
        ,'id'
    ];

    public function getId(){
        return $this->id;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($value){
        $this->code = $value;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($value){
        $this->name = $value;
    }

    public function getHex(){
        return $this->hex;
    }

    public function setHex($value){
        $this->hex = $value;
    }
    
    public function getImage(){
        return $this->image;
    }

    public function setImage($value){
        $this->image = $value;
    }

    /** SCOPE */
    public function scopeCode($query, $value){
        return $query->where('code', $value);
    }
}
