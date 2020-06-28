<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($reply)
        {
            $reply->user_id = auth()->id();
        });
    }

    protected $fillable = ['body', 'question_id', 'user_id'];

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
