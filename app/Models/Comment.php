<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];


    // Relacion polimorfica
    public function commentable()
    {
        return $this->morphTo();
    }

    // Relacion polimorfica 1:M (Con el mismo, ya que un comantario puede tener comentarios)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Relacion polimorfica 1:M
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }

    // Relacion 1:M inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
}
