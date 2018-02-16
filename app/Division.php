<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    public static function validasi(){
        return [
            'name' => 'required|min:3|max:45',
            'description' => 'required',
            'is_active' => 'required'
        ];
    }

    public function employee(){
        return $this->hasMany('App\Employee');
    }
}
