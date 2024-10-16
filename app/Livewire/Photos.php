<?php

namespace App\Livewire;

use App\Models\Photo;
use Livewire\Component;

class Photos extends Component
{
    public int $on_page = 24;
    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }

    public function photos()
    {
        return Photo::query()
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })->latest()->paginate($this->on_page);
    }

    public function loadMore(): void
    {
        $this->on_page += 24;
    }

    public function render()
    {
        return view('livewire.photos', [
            'photos' => $this->photos(),
        ]);
    }
}
