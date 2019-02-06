<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
	public function index(Request $request) {
		$genre = $request->query('genre');
    	$query = DB::table('tracks')
    		->select('tracks.Name as trackName', 'UnitPrice', 'artists.Name as artistName', 'albums.title as Title')
    		->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    		->join('genres', 'tracks.GenreId', '=', 'genres.GenreId')
    		->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId');

    	if ($request->query('genre')) {
    		$query->where('genres.Name', '=', $request->query('genre'));
    	}
    	$tracks = $query->get();
    	return view('tracks', [
    		'tracks' => $tracks
    	]);
    }

    public function create() {
        $albums = DB::table('albums')->get();
        $media = DB::table('media_types')->get();
        $genres = DB::table('genres')->get();
        return view('create', [
            'albums' => $albums,
            'medias' => $media,
            'genres' => $genres
        ]);
    }

    public function store(Request $request) {
        $input = $request->all();
        $validation = Validator::make($input, [
            'name' => 'required|unique:playlists,Name',
            'album' => 'required',
            'media' => 'required',
            'genre' => 'required',
            'composer' => 'required',
            'millisecond' => 'required',
            'byte' => 'required',
            'price' => 'required'
        ]);
        if ($validation->fails()) {
            return redirect('/tracks/new')
            ->withInput()
            ->withErrors($validation);
        }
        DB::table('tracks')->insert([
            'Name' => $request->name,
            'AlbumId' => $request->album,
            'MediaTypeId' => $request->media,
            'GenreId' => $request->genre,
            'Composer' => $request->composer,
            'Milliseconds' => $request->millisecond,
            'Bytes' => $request->byte,
            'UnitPrice' => $request->price
        ]);
        return redirect('/tracks');
    }
}
