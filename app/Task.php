<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[

    'title','description','date','startTime','endTime','notify_before',

    ];

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','teacher_id');
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
