<?php

namespace App\Http\Livewire\Draft;

use App\Models\User;
use App\Models\Draft;
use Livewire\Component;

class Quote extends Component
{
    public $draft;
    Public $quoteBody;
    Public $user;

    protected $rules = [
        'quoteBody' => 'required|min:4',
    ];

    public function mount(Draft $draft)
    {
        $this->draft = $draft;
    }

    public function submit()
    {
        $this->validate();
        
        auth()->user()->quotes()->create([
            'quoteBody' => $this->quoteBody,
            'draft_id' => $this->draft->id,
        ]);  

        $this->quoteBody = "";

    }

    public function render()
    {
        return view('livewire.draft.quote')->layout('layouts.app');
    }
}
