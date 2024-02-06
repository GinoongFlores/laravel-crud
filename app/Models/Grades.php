<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_1',
        'subject_2',
        'subject_3',
        'subject_4',
        'subject_5',
        'average'
    ];
}
