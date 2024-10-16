<?php

namespace App\Livewire;

use App\Models\Photo;
use Livewire\Component;

class Comments extends Component
{
    public $photo;

    protected $listeners = ['commentAdded' => '$refresh'];

    public function mount(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->photo->comments()->latest()->get(),
        ]);
    }
}