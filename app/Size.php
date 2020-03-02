<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

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

    /** SCOPE */
    public function scopeCode($query, $value){
        return $query->where('code', $value);
    }
}
