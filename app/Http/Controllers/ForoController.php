<?php

namespace App\Http\Controllers;

use App\Foro;
use App\Comentario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ForoController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $foros = Foro::paginate(10);
            return view('foro.index', compact('foros'));
        } else {
            return view('contenido-privado');
        }
    }
    public function mostrar($id)
    {
        if(Auth::check()){
        	$foro = Foro::find($id);
            $comentarios = collect($foro->comentarios);
            //return $foro->comentarios;
            return view('foro.foro', compact('comentarios', 'foro'));
        } else {
            return view('contenido-privado');
        }
    }
    public function nuevo(Request $request)
    {
        if(Auth::check()){
        	$foro = new Foro;
        	$foro->nombre = $request->nombre;
        	$foro->id_usuario = Auth::id();
 			$foro->save(); 
            return redirect('/Foro');
        } else {
            return view('contenido-privado');
        }
    }
    public function comentar(Request $request, $id)
    {
        if(Auth::check()){
            $com = new Comentario;
            $com->id_foro = $id;
            $com->id_usuario = Auth::id();
            $com->comentario = $request->comentario;
            $com->save();
            $foro = Foro::find($id);
            $foro->cantidad = $foro->cantidad + 1;
            $foro->update();
            return redirect('/Foro/'.$id);
        } else {
            return view('contenido-privado');
        }
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
