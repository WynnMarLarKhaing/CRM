<?php

namespace App\Http\Controllers;

use App\Album;

class AlbumController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['index','add']);
	}

    public function index(){
    	$albums = Album::all();
    	return view("album/index",[
    		"albums" => $albums
    	]);
    }

    public function view($id){
        $albums = Album::find($id);
        return view("album/view",[
            "albums" => $albums
        ]);
    }
}
