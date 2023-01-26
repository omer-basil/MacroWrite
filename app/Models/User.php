<?php

namespace App\Models;

use App\Models\Magazine;
use App\Models\Like;
use App\Models\Dislike;
use App\Models\Comment;
use App\Models\Subscription;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function magazine()
    {
        return $this->hasOne(Magazine::class);
    }

    public function owns(Draft $draft)
    {
        return $this->id === $draft->magazine->user_id;
    }

    public function ownsMag(Magazine $magazine)
    {
        return $this->id === $magazine->user_id;
    }

    public function subscribes()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribedMagazines()
    {
        //passing the name of the subscribed magazine through the subscribes table to get them sa model not a number
        return $this->belongsToMany(Magazine::class, 'subscribes');
    }

    public function isSubscribedTo(Magazine $magazine)
    {
        //check if the user is subcribed to the magazine already, it is useful for toggling
        return (bool) $this->subscribes->where('magazine_id', $magazine->id)->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
