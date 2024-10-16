<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $photos = Auth::user()->photos;
        return view('albums.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'selected_photos' => 'required',
        ]);

        $album = Album::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $photo_ids = explode(',', $request->selected_photos);
        Photo::whereIn('id', $photo_ids)->update(['album_id' => $album->id]);

        return redirect('/albums/' . $album->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $photos = $album->photos;
        return view('albums.show', compact('album', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        if ($album->user_id !== Auth::id()) {
            return redirect('/albums/create');
        }
        $selected_photos = Photo::where('album_id', $album->id)->get();
        $unselected_photos = Photo::where('album_id', null)->where('user_id', $album->user_id)->get();
        $photo_ids = $selected_photos->pluck('id')->toArray();
        $selected_photo_ids = implode(',', $photo_ids);
        return view('albums.edit', compact('album', 'selected_photos', 'unselected_photos', 'selected_photo_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'selected_photos' => 'required',
        ]);

        $album->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $photo_ids = explode(',', $request->selected_photos);

        Photo::where('album_id', $album->id)
            ->whereNotIn('id', $photo_ids)
            ->update(['album_id' => null]);

        Photo::whereIn('id', $photo_ids)->update(
            ['album_id' => $album->id]
        );

        return redirect('/albums/' . $album->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        if ($album->user_id !== Auth::id()) {
            return redirect('/albums')->with('error', 'Anda tidak memiliki akses untuk menghapus album ini.');
        }
        $album->delete();
        return redirect('/albums')->with('success', 'Album berhasil dihapus.');
    }

}