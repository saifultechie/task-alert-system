<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use Notifiable;
    protected $fillable=[

    'name','designation','email',

    ];


     public function task()
    {
        return $this->hasMany('App\Models\Teacher', 'teacher_id');
    }

     public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User','updated_by');
    }
}
