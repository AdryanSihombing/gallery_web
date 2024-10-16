<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Photo $photo) {
        $user = User::find(Auth::id());

        if (!$user->hasLiked($photo)) {
            Like::firstOrCreate([
                'user_id' => Auth::id(),
                'photo_id' => $photo->id,
            ]);
        } else {
            $like = Like::where('user_id', Auth::id())
                ->where('photo_id', $photo->id)
                ->first();

            if ($like) {
                $like->delete();
            }
        }

        return back()->with('user', $user);
    }
}
