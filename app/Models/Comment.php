<?php

namespace App\Models;

use App\Models\User;
use App\Models\Draft;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $with = ['user', 'replies'];


    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function draft()
    {
        return $this->belongsTo(Draft::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_id', 'id');
    }
}
