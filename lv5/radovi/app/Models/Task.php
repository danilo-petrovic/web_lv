<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title_hr',
        'title_en',
        'description',
        'study_type',
    ];
}
