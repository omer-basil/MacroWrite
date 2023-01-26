<?php

namespace App\Http\Livewire\Draft;

use App\Models\Draft;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\WithPagination;

class CreateComment extends Component
{
    use WithPagination;

    public $draft;
    public $body;
    public $col;  //represents the reply ID

    protected $rules = [
        'body' => 'required',
    ];

    public function mount(Draft $draft, $col)
    {
        $this->draft = $draft;
        $col == 0 ? $this->col = null : $this->col =$col;  //check if the reply id is set to null then add it as a comment other wise it will be a reply
    }

    public function restForm()
    {
        $this->body = "";
    }

    public function addComment(User $user, Comment $comment)
    {
        //validation
        $this->validate();
        
        auth()->user()->comments()->create([
            'body' => $this->body,
            'draft_id' => $this->draft->id,
            'reply_id' => $this->col
        ]);

        $this->body = "";

        $owner = $this->draft->magazine->user;

        if( $owner->id !== auth()->user()->id ) 
        {

            $comment = [
                'body' => $this->body,
                'draft' => $this->draft->title,
                'uid' => $this->draft->uid,
                'user' => auth()->user()->name,
            ];
            
            Notification::send($owner, new CommentNotification($comment));
        }



        //emit the comment

        $this->emit('commentCreated');

    }

    public function render()
    {
        return view('livewire.draft.create-comment')->extends('layouts.app');
    }
}
