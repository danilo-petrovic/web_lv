<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'task_id',
        'student_id',
        'status',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
