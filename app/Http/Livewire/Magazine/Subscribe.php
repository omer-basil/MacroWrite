<?php

namespace App\Http\Livewire\Magazine;

use App\Models\Magazine;
use App\Models\Subscription;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Notifications\SubscribeNotification;
use Illuminate\Support\Facades\Notification;

class Subscribe extends Component
{
    use AuthorizesRequests;

    public $magazine;
    public $userSubscribed = false;

    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Magazine $magazine)
    {
        $this->magazine = $magazine;

        if(auth::check())
        {
            if(auth()->user()->isSubscribedTo($this->magazine)) 
            {
            $this->userSubscribed = true;
            }
        }
    }

    public function toggle()
    {
        //only allow registered accounts to funciton
        if(!Auth::Check())
        {
            return message('You have to be logged in');
        }
        else
        {

        // $this->authorize('create', $this->magazine);
        
            if(auth()->user()->isSubscribedTo($this->magazine))
            {
                Subscription::where('user_id', auth()->id())->where('magazine_id', $this->magazine->id)->delete();
                $this->userSubscribed = false;
            }
            else
            {
                Subscription::create([
                    'user_id' => auth()->id(),
                    'magazine_id' => $this->magazine->id,
                ]);
                $this->userSubscribed = true;

                $owner = $this->magazine->user;

                if( $owner->id !== auth()->user()->id ) 
                {

                    $subscribe = [
                        'user' => auth()->user()->name,
                        'magazine_id' => $this->magazine->id,
                    ];
                    
                    Notification::send($owner, new SubscribeNotification($subscribe));
                    
                }
            }
        }
        $this->emit('load_values');
    }

    public function render()
    {
        return view('livewire.magazine.subscribe')->extends('layouts.app'); 
    }
}
