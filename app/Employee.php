<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'profile',
        'photo',
        'skill_id',
        'division_id'
    ];

    public static function validasi(){
        return [
            'first_name' => 'required|min:3|max:45',
            'last_name' => 'required|min:3|max:45',
            'profile' => 'required|min:3|max:45',
            'photo' => 'required|image|max:1000',
            'skill_id' => 'required',
            'division_id' => 'required'
        ];
    }

    public function skill(){
        return $this->belongsTo('App\Skill', 'skill_id');
    }

    public function division(){
        return $this->belongsTo('App\Division', 'division_id');
    }

    public function attendance(){
        return $this->hasMany('App\Attendance');
    }
}
