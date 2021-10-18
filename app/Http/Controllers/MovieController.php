<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Carbon\Carbon;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies|max:50',
            'genres' => 'required',
            'posterpath' => 'required'
        ]);

        $data = $request->all();
        $movie = new Movie();

        // $movie->title = $data['title'];
        // $movie->overview = $data['overview'];

        $movie->fill($data);


        // $slug = Str::slug($movie->title, '-');
        // $movie->slug=$slug;

        $movie->save();
        return redirect()->route('movies.show', $movie->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        // $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => ['required', Rule::unique('movies')->ignore($movie->id), 'max:50'],
            'genres' => 'required',
            'posterpath' => 'required'
        ]);


        $data = $request->all();
        $movie->update($data);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }



    public function trash()
    {
        $movies = Movie::onlyTrashed()->get();
        return view('movies.trash', compact('movies'));
    }

    public function restore($id)
    {
        $movie = Movie::onlyTrashed()->find($id);
        $movie->restore();
        return redirect()->route('movies.index');
    }

    public function delete($id)
    {
        $movie = Movie::onlyTrashed()->find($id);
        $movie->forceDelete();
        return redirect()->route('movies.index');
    }
}
