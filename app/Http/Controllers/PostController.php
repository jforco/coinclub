<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Request $request)
    {
        if(Auth::check()){
            //retornar todos los posts de la categoria, publicados
            $posts = Post::where('category_id', 1)
                ->where('status', 'published')->get();
            $url = "ICOs";
            return view('noticias.index', compact('posts', 'url'));
        } else{

            //retornar todos los posts de la categoria, publicados, publicos
            $posts = Post::where('category_id', 1)
                ->where('status', 'published')
                ->where(function ($query) {
                    $fechaAyer = new Carbon('yesterday');
                    $query->where('privacidad', 0)
                      ->orWhere('updated_at', '<', $fechaAyer);
                })
                ->get();
            $url = "ICOs";
            return view('noticias.index', compact('posts', 'url'));
        }
    }
    public function index2(Request $request)
    {
        if(Auth::check()){
            //retornar todos los posts de la categoria, publicados
            $posts = Post::where('category_id', 2)
                ->where('status', 'published')->get();
            $url = "Analisis";
            return view('noticias.index', compact('posts', 'url'));
        } else{
            //retornar todos los posts de la categoria, publicados, publicos
            $posts = Post::where('category_id', 2)
                ->where('status', 'published')
                ->where('privacidad', 0)->get();
            $url = "Analisis";
            return view('noticias.index', compact('posts', 'url'));
        }
    }
    public function index3(Request $request)
    {
        if(Auth::check()){
            //retornar todos los posts de la categoria, publicados
            $posts = Post::where('category_id', 6)
                ->where('status', 'published')->get();
            $url = "Noticias";
            return view('noticias.index', compact('posts', 'url'));
        } else{
            //retornar todos los posts de la categoria, publicados, publicos
            $posts = Post::where('category_id', 6)
                ->where('status', 'published')
                ->where('privacidad', 0)->get();
            $url = "Noticias";
            return view('noticias.index', compact('posts', 'url'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($from, $slug)
    {
        //
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        if($post->privacidad == 0){
            //return 'entro';
            $fecha = $post->created_at->format('j \\d\\e F \\d\\e Y');
            return view('noticias.post', compact('post', 'from', 'fecha'));
        } else {
            if(Auth::check()){
                $fecha = $post->created_at->format('j \\d\\e F \\d\\e Y');
                return view('noticias.post', compact('post', 'from', 'fecha'));
            } else {
                return view('contenido-privado');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function trading(){
        $pagina = Post::where('category_id', 3)->first();
        return view('noticias.pagina', compact('pagina'));
    }
        
    public function mineria(){
        $pagina = Post::where('category_id', 4)->first();
        return view('noticias.pagina', compact('pagina'));
    }
}
