<?php

namespace App\Http\Livewire\Draft;

use Livewire\Component;
use App\Models\Draft;
use App\Models\Magazine;


class DraftTemp extends Component
{
    public Draft $draft;
    public Magazine $magazine;


    public function render()
    {
        return view('draft.index')->extends('layouts.app');
    }

    public function mount(Magazine $magazine, Draft $draft)
    {
        $this->magazine = $magazine;
        $this->article = $article;
    }

    public function autoSave()
    {
        $this->draft = $this->magazine->drafts()->create([
            'body' => $this->body,
        ]);
    }
}
