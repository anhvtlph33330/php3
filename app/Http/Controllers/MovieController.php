<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Movie::query();
        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        $movies = $query->orderByDesc('id')->paginate(10);
        return view('movie.index', compact('movies', 'search'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $data = $request->except('poster');
        if ($request->hasFile('poster')) {
            $data['poster'] = Storage::put('image', $request->poster);
        }
        Movie::query()->create($data);
        return redirect()->route('movies.index')->with('message', 'Thêm mới thành công');
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movie.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->except('poster');
        $newPoster = $request->hasFile('poster');
        $oldPoster = $movie->poster;
        if ($newPoster) {
            $data['poster'] = Storage::put('image', $request->poster);
        }
        $movie->update($data);
        if ($newPoster) {
            if ($oldPoster && Storage::exists($oldPoster)) {
                Storage::delete($oldPoster);
            }
        }
        return back()->with('message', "cập nhật thành công");
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        $poster = $movie->poster;
        if ($poster && Storage::exists('poster')) {
            Storage::delete($poster);
        }
        return back()->with('message', 'xóa thành công');
    }
}
