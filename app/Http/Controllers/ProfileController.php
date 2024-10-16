<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        if (Auth::check()) {
            $self = Auth::user()->id === $user->id;
        } else {
            $self = false;
        }

        $photos = $user->photos;
        return view('account.index', compact('user', 'self', 'photos'));
    }

    public function albums(User $user)
    {
        $self = false;
        if (Auth::check()) {
            $self = Auth::user()->id === $user->id;
        }

        $albums = $user->albums;

        return view('account.albums', compact('user', 'self', 'albums'));
    }

    public function likes(User $user)
    {
        $self = false;
        if (Auth::check()) {
            $self = Auth::user()->id === $user->id;
        }

        $photos = $user->likes;

        return view('account.likes', compact('user', 'self', 'photos'));
    }
}