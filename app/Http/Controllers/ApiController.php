<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signal;
use App\User;
use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use TCG\Voyager\Facades\Voyager;

class ApiController extends Controller
{
    //

    public function login(Request $request)
    {
        
        try{
        	$user = User::where('email', $request->email)->firstOrFail();;
        } catch (ModelNotFoundException $e){
        	//el usuario no existe
        	$respuesta = ['codigo' => '1'];
        	return response()->json($respuesta, 400);
        }
        //
        $pass1 = $request->password;
        //return response($user->password);
        $pass2 = $user->password;

        if (Hash::check($pass1, $pass2 ))
		{
            //todo correcto devolvemos el user
		    $user->token = $request->token;
		    $user->update();
            $usuario = new User;
            $usuario->name = $user->name;
            $usuario->email = $user->email;
            $usuario->created_at = $user->created_at;
            $usuario->token = $user->token;
            $usuario->estado = $user->estado;
            $respuesta = ['codigo' => '200', 'usuario' => $usuario];
            return response()->json($respuesta, 200);
		} else {
            //la contrasena es erronea
			$respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
		}

        
    }
/*
    public function signals(Request $request)
    {
        //
        try{
        	$user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
        	//el usuario no existe
        	$respuesta = ['mensaje' => 'El token de usuario no existe'];
        	return response()->json($respuesta, 400);
        }
        $signals = Signal::all();
        return response()->json($signals, 200); 
    }

    public function signals_day(Request $request)
    {
        //ver que el usuario esta registrado
        //return date($request->fecha);
        try{
            $user = User::where('token', $request->token)->firstOrFail();
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['mensaje' => 'El token de usuario no existe'];
            return response()->json($respuesta, 400);
        }


        //buscar signals de esa fecha
        try{
            $signals = Signal::whereDate('created_at','=', date($request->fecha))->orderBy('created_at', 'desc')->get();
            return response()->json($signals, 200);
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['mensaje' => 'No existen se���ales en la fecha enviada.'];
            return response()->json($respuesta, 400);
        }
        
         
    }


    public function signals_month(Request $request)
    {
        //ver que el usuario esta registrado
        //return date($request->fecha);
        try{
            $user = User::where('token', $request->token)->firstOrFail();
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['mensaje' => 'El token de usuario no existe'];
            return response()->json($respuesta, 400);
        }


        //buscar signals de ese mes de ese a���o
        
        try{
            $signals = Signal::whereYear('created_at','=', $request->year)
                        ->whereMonth('created_at','=', $request->month)->orderBy('created_at', 'desc')->get();
            return response()->json($signals, 200);
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['mensaje' => 'No existen se���ales en la fecha enviada.'];
            return response()->json($respuesta, 400);
        }
        
         
    }*/

    public function signals_pendiente(Request $request)
    {
        //
        try{
            $user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
        }
        $signals = Signal::where('estado', '1')->orderBy('created_at', 'desc')->get();
        foreach ($signals as $signal) {
            if($signal->estado == '1'){
                $signal->estado = 'Pendiente';
            }elseif ($signal->estado == '2'){
                $signal->estado = 'Cumplida';
            }else{
                $signal->estado = 'Perdida';
            }
        }
        $respuesta = ['codigo' => '200', 'señales' => $signals];
        return response()->json($respuesta, 200);
    }

    
    
    public function signals_cumplida(Request $request)
    {
        //
        try{
            $user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
        }
        $signals = Signal::where('estado', '2')->orderBy('created_at', 'desc')->get();
        foreach ($signals as $signal) {
            if($signal->estado == '1'){
                $signal->estado = 'Pendiente';
            }elseif ($signal->estado == '2'){
                $signal->estado = 'Cumplida';
            }else{
                $signal->estado = 'Perdida';
            }
        }
        $respuesta = ['codigo' => '200', 'señales' => $signals];
        return response()->json($respuesta, 200);
    }
    
    
    public function signals_perdida(Request $request)
    {
        //
        try{
            $user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
        }
        $signals = Signal::where('estado', '3')->orderBy('created_at', 'desc')->get();
        foreach ($signals as $signal) {
            if($signal->estado == '1'){
                $signal->estado = 'Pendiente';
            }elseif ($signal->estado == '2'){
                $signal->estado = 'Cumplida';
            }else{
                $signal->estado = 'Perdida';
            }
        }
        $respuesta = ['codigo' => '200', 'señales' => $signals];
        return response()->json($respuesta, 200);
    }
    



    public function signals_last20(Request $request)
    {
        //
        try{
            $user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
        }
        $signals = Signal::orderBy('created_at', 'desc')->take(20)->get();

        foreach ($signals as $signal) {
            if($signal->estado == '1'){
                $signal->estado = 'Pendiente';
            }elseif ($signal->estado == '2'){
                $signal->estado = 'Cumplida';
            }else{
                $signal->estado = 'Perdida';
            }
        }
        $respuesta = ['codigo' => '200', 'señales' => $signals];
        return response()->json($respuesta, 200);
    }




    public function noticias20(Request $request)
    {
        //
        try{
            $user = User::where('token', $request->token)->firstOrFail();;
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            $respuesta = ['codigo' => '2'];
            return response()->json($respuesta, 400);
        }

        $noticias = Post::select('title', 'category_id', 'excerpt', 'body', 'image', 'created_at', 'privacidad')->where('category_id', '<', 3)->where('status', 'PUBLISHED')
                    ->orderBy('created_at', 'desc')->take(10)->get();
        //formatear noticia
        foreach ($noticias as $noticia) {
            //categoria no se puede, es nro
            //imagen
            $noticia->image = Voyager::image(str_replace('.jpg','-cropped.jpg', $noticia->image));
        }
        $respuesta = ['codigo' => '200', 
        'noticias' => $noticias];
        return response()->json($respuesta, 200);
    }
}
