<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

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

    public function getLogoUrl(){
        return $this->logo_url;
    }

    public function setLogoUrl($value){
        $this->logo_url = $value;
    }

    /** SCOPE */
    public function scopeCode($query, $value){
        return $query->where('code', $value);
    }
}
