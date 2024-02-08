<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'course',
    ];

    public function grades() {
        return $this->hasMany(Grades::class);
    }
}
