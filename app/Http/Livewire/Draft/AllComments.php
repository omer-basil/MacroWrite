<?php

namespace App\Http\Livewire\Draft;

use App\Models\Draft;
use App\Models\User;
use App\Models\Comment;
use Livewire\Component;

class AllComments extends Component
{
    public $draft;

    protected $listeners = ['commentCreated' => '$refresh'];

    public function mount(Draft $draft)
    {
        $this->draft = $draft;
    }

    public function render()
    {
        return view('livewire.draft.all-comments');
    }
}
