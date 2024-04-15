<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

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

    public function student() {
        return $this->belongsTo(Students::class, 'students_id', 'id');
    }
}
