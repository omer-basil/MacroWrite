<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Quote;
use App\Models\Comment;
use App\Models\Dislike;
use App\Models\Bookmark;
use App\Models\Magazine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Draft extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['comments'];

    public function ownedBy(Magazine $magazine)
    {
        return $magazine->id === $this->magazine_id;
    }

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function Bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    //to tell if the user had already interacted the viewed article
    public function doesUserBookmarkedDraft()
    {
        return $this->bookmarks()->where('user_id', auth()->id())->exists();
    }

    public function doesUserLikedDraft()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function doesUserDislikedDraft()
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }

    public function allCommentsCount()
    {
        return $this->hasMany(Comment::class)->count();
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    /**
     * Get the instance of the user visits
     *
     * @return \Awssat\Visits\Visits
     */
    public function visitsCounter()
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     * 
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function visits()
    {
        return visits($this)->relation();
    }

}
