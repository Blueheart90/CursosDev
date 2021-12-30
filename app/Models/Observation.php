<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    // Relacion 1:1 inversa
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
