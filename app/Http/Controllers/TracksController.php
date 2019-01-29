<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}
