<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }


    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            // Tambahkan validasi untuk field lain, misalnya gambar
        ]);

        Album::create($validated);
        return redirect()->route('admin.albums')->with('success', 'Album created successfully.');
    }
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('admin.albums')->with('success', 'Album deleted successfully.');
    }
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            // Tambahkan validasi untuk field lain
        ]);

        $album->update($validated);
        return redirect()->route('admin.albums')->with('success', 'Album updated successfully.');
    }

    }