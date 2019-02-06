<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    public function index() {
    	$genres = DB::table('genres')->get();
    	return view('genres', [
    		'genres' => $genres
    	]);
    }

    public function edit($id) {
    	$genre = DB::table('genres')
    		->where('GenreId', '=', $id)
    		->first();
    	return view('edit', [
    		'genre' => $genre
    	]);
    }

    public function store(Request $request) {
    	$input = $request->all();
    	$validation = Validator::make($input, [
            'name' => 'required|min:3|unique:playlists,Name'
        ]);
        if ($validation->fails()) {
        	$direct = '/genres/' . $request->genreId . '/edit';
            return redirect($direct)
            ->withInput()
            ->withErrors($validation);
        }
        DB::table('genres')
        	->where('GenreId', '=', $request->genreId)
        	->update([
        		'Name' => $request->name
        	]);
        return redirect('/genres');
    }
}
