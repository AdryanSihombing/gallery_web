<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Photo;
use Livewire\Component;

class CommentForm extends Component
{
    public $photo;
    public $comment;

    public function mount(Photo $photo)
    {
        $this->photo = $photo;
    }

    public function submit()
    {
        $this->validate([
            'comment' => 'required|string|max:255',
        ]);

        Comment::create([
            'photo_id' => $this->photo->id,
            'user_id' => auth()->id(),
            'comment' => $this->comment,
        ]);

        // Reset the comment field after submitting
        $this->comment = '';

        $this->dispatch('commentAdded');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
