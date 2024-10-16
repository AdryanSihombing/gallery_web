<?php

namespace App\Livewire;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ToggleLike extends Component
{
    public $photo;
    public $liked;

    public function mount(Photo $photo)
    {
        $this->photo = $photo;
        $this->liked = $this->photo->likes->contains('user_id', Auth::id());
    }

    public function toggleLike()
    {
        if ($this->liked) {
            // Jika sudah di-like, hapus like
            $this->photo->likes()->where('user_id', Auth::id())->delete();
            $this->liked = false;
        } else {
            // Jika belum di-like, tambahkan like
            $this->photo->likes()->create([
                'user_id' => Auth::id(),
            ]);
            $this->liked = true;
        }

        // Refresh relasi likes untuk memperbarui tampilan
        $this->photo->refresh();
    }
    public function render()
    {
        return view('livewire.toggle-like');
    }
}