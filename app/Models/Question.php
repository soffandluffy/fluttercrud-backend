<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

}
