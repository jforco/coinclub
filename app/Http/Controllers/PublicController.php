<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videoteca;
use App\Descarga;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{
    //
    public function video(){
    	$videos = Videoteca::all();
    	//return $videos;
    	return view('videoteca.index', compact('videos'));
    }

    public function descargas(){
    	$descargas = Descarga::all();
    	//return $descargas;
    	return view('descargas', compact('descargas'));
    }

    public function descargaArchivo($archivo){
    	//return 'entra';
    	$info = Descarga::findOrFail($archivo);
    	$x = collect(json_decode($info->archivo, true))[0];
    	$y = $x['download_link'];
    	//$ubicacion = env('APP_URL').'/storage/'.$y;
    	//$ubicacion2 = $ubicacion->download_link;
    	$url = Storage::url('slick-1.8.0.zip');
    	//return Storage::response($url);
    	return response()->download($url);
    }
}
