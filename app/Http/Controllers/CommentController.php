<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function post_comment(Request $request, Photo $photo)
    {
        // validate the request
        $validated_comment = $request->validate([
            'comment' => 'required',
        ]);

        // store the comment
        $validated_comment['user_id'] = Auth::id();
        $validated_comment['photo_id'] = $photo->id;
        Comment::create($validated_comment);

        return redirect()->route('photos.show', $photo);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();

            return redirect()->back()->with('success', 'Komentar telah dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus komentar');
    }
}
