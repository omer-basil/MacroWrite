<?php

namespace App\Http\Livewire\Draft;

use Livewire\Component;

use App\Models\Like;
use App\Models\Draft;
use App\Models\Dislike;
use App\Models\Bookmark;
use App\Policies\VotingPolicy;
use App\Notifications\LikeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Voting extends Component
{
    use AuthorizesRequests;

    public $draft;
    public $likes;
    public $dislikes;
    public $likeActive;
    public $dislikeActive;
    public $bookmark;
    public $bookmarkActive;

    protected $listeners = ['load_values' => '$refresh'];
    protected $with = ['draft'];

    public function mount(Draft $draft)
    {
        $this->draft = $draft;

        $this->checkIfBookmarked();
        $this->checkIfLiked();
        $this->checkIfDisliked();
    }

    public function checkIfBookmarked()
    {
        $this->draft->doesUserBookmarkedDraft() ? $this->bookmarkActive = true : $this->bookmarkActive = false;
    }

    public function checkIfLiked()
    {
        $this->draft->doesUserLikedDraft() ? $this->likeActive = true : $this->likeActive = false;
    }

    public function checkIfDisliked()
    {
        $this->draft->doesUserDislikedDraft() ? $this->dislikeActive = true : $this->dislikeActive = false;
    }

    public function bookmark()
    {
        //only allow registered accounts to funciton
        // $this->authorize('create', $this->draft);

        //check if the user had bookmarked the draft already
        if($this->draft->doesUserBookmarkedDraft())
        {
            Bookmark::where('user_id', auth()->id())->where('draft_id', $this->draft->id)->delete();
            $this->BookmarkActive = false;
        }
        else
        {
            $this->draft->bookmarks()->create([
                'user_id' => auth()->id(),
            ]);   

            $this->BookmarkActive = true;
        }

        $this->emit('load_values');
    }

    public function like()
    {
        //only allow registered accounts to funciton
        // $this->authorize('create', $this->draft);

        //check if the user had liked the draft already
        if($this->draft->doesUserLikedDraft())
        {
            Like::where('user_id', auth()->id())->where('draft_id', $this->draft->id)->delete();
            $this->likeActive = false;
        }
        else
        {
            $this->draft->likes()->create([
                'user_id' => auth()->id(),
            ]);   

            $this->disableDislike();
            $this->likeActive = true;

            $owner = $this->draft->magazine->user;

            if( $owner->id !== auth()->user()->id ) 
            {

                $like = [
                    'user' => auth()->user()->name,
                    'draft' => $this->draft->title,
                    'uid' => $this->draft->uid,
                ];
                
                Notification::send($owner, new LikeNotification($like));
                }
            }

        $this->emit('load_values');
    }

    //to toggle between like and dislike
    public function disableDislike()
    {
        Dislike::where('user_id', auth()->id())->where('draft_id', $this->draft->id)->delete();
        $this->dislikeActive = false;
    }

    public function dislike()
    {
        //only allow registered accounts to funciton
        // $this->authorize('create', $this->draft);

        //check if the user had disliked the draft already
        if($this->draft->doesUserDislikedDraft())
        {
            Dislike::where('user_id', auth()->id())->where('draft_id', $this->draft->id)->delete();
            $this->dislikeActive = false;
        }
        else
        {
            $this->draft->dislikes()->create([
                'user_id' => auth()->id(),
            ]);   

            $this->disableLike();
            $this->dislikeActive = true;
        } 

        $this->emit('load_values');
    }

    //to toggle between dislike and like
    public function disableLike()
    {
        Like::where('user_id', auth()->id())->where('draft_id', $this->draft->id)->delete();
        $this->likeActive = false;
    }

    public function render()
    {
        $this->likes = $this->draft->likes->count();
        $this->dislikes = $this->draft->dislikes->count();
        $this->bookmarks = $this->draft->bookmarks->count();

        return view('livewire.draft.voting')->extends('layouts.app');
    }
}
