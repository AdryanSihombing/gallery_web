<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        return view('photos.index', compact('search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $validated_data['image'] = $request->file('image')->store('photos', 'public');
        $validated_data['user_id'] = Auth::id();

        $photo = Photo::create($validated_data);

        return redirect('/photos/' . $photo->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $photo = Photo::findOrFail($id);

        // Hanya pemilik atau admin yang bisa mengedit
        if (auth()->user()->role === 'admin' || auth()->user()->id == $photo->user_id) {
            return view('photos.edit', compact('photo'));
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit postingan ini.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        if (Auth::user()->id !== $photo->user_id) {
            return redirect('/');
        }

        $validated_data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated_data['image'] = $request->file('image')->store('photos', 'public');
        } else {
            $validated_data['image'] = $photo->image;
        }

        $photo->update($validated_data);

        return redirect('/photos/' . $photo->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $username = Auth::user()->username;

        $photo->delete();

        return redirect('/u/' . $username);
    }

    public function download($id)
    {
        // Temukan foto berdasarkan ID
        $photo = Photo::findOrFail($id);

        // Path ke file gambar
        $filePath = storage_path('app/public/' . $photo->image);

        // Periksa apakah file ada
        if (file_exists($filePath)) {
            // Kembalikan file untuk diunduh
            return response()->download($filePath, $photo->title . '.' . pathinfo($photo->image, PATHINFO_EXTENSION));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }
    }


    public function print($id)
    {
        // Ambil foto berdasarkan ID
        $photo = Photo::findOrFail($id);

        // Kembalikan view untuk mencetak foto
        return view('photos.print', compact('photo'));
    }
}