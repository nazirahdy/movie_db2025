<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->paginate(6);

        return view('homepage', [
            'movies'      => $movies,
            'currentPage' => $movies->currentPage(),
            'lastPage'    => $movies->lastPage(),
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('movie_form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'synopsis'    => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'year'        => 'required|integer|min:1900|max:' . date('Y'),
            'actors'      => 'required|string',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('cover_image')->store('cover_images', 'public');
        $data['cover_image'] = '/storage/' . $path;

        $data['slug'] = Str::slug($data['title']);

        Movie::create($data);

        return redirect()->route('homepage')
                         ->with('success', 'Movie berhasil disimpan!');
    }

    public function show($id)
    {
        $movie = Movie::with('category')->findOrFail($id);
        return view('movie_detail', compact('movie'));
    }
}
