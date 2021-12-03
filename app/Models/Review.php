<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relacion 1:M inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relacion 1:M inversa
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
