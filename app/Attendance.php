<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'checkin',
        'checkout'
    ];

    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
