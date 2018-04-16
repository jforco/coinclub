<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Signal;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function index(){
        if (Auth::user()) {
            $user = Auth::user();
            if($user->estado == 0){
                Auth::logout();
                return view('usuarios.activacuenta');
            }
        }
        //$fechaSemana = Carbon::today()->subDay(7);
        //$fechaMes = Carbon::today()->subDay(30);
        //$fechaSemana = Carbon::now()->startOfWeek();

        $fechaMes = Carbon::now()->startOfMonth();
        $fechaInicio = $fechaMes->subMonth();
        $fechaFin = $fechaMes->subDay();

        $nro = Carbon::now()->month;
        $nro = $nro-1;
        if($nro == 0) {
            $nro = 12;
        }
        $mes = '';
        if($nro==1){
            $mes = 'Enero';
        } elseif ($nro==2) {
            $mes = 'Febrero';
        } elseif ($nro==3) {
            $mes = 'Marzo';
        } elseif ($nro==4) {
            $mes = 'Abril';
        } elseif ($nro==5) {
            $mes = 'Mayo';
        } elseif ($nro==6) {
            $mes = 'Junio';
        } elseif ($nro==7) {
            $mes = 'Julio';
        } elseif ($nro==8) {
            $mes = 'Agosto';
        } elseif ($nro==9) {
            $mes = 'Septiembre';
        } elseif ($nro==10) {
            $mes = 'Octubre';
        } elseif ($nro==11) {
            $mes = 'Noviembre';
        } elseif ($nro==12) {
            $mes = 'Diciembre';
        } else {
            $mes = 'Actual';
        }
        /*
        $SemanaCant = Signal::where('created_at', '>', $fechaSemana)->count();
        $SemanaActivas = Signal::where('created_at', '>', $fechaSemana)
                                ->where('estado', 2)->count();
        $SemanaPendientes = Signal::where('created_at', '>', $fechaSemana)
                                ->where('estado', 1)->count();
        */                        
       
        //mes anterior
        
        $MesCant = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)->count();
        $MesActivas = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 2)->count();
        $MesPendientes = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 1)->count();
        $MesPerdidas = $MesCant - $MesActivas - $MesPendientes;
        
        //mes anterior y actual
        /*
        $MesCant = Signal::where('created_at', '>', $fechaInicio)->count();
        $MesActivas = Signal::where('created_at', '>', $fechaInicio)
                                ->where('estado', 2)->count();
        $MesPendientes = Signal::where('created_at', '>', $fechaInicio)
                                ->where('estado', 1)->count();
        */
        
        
        $MesActualCant = Signal::where('created_at', '>', $fechaMes)->count();
        $MesActualActivas = Signal::where('created_at', '>', $fechaMes)
                                ->where('estado', 2)->count();
        $MesActualPendientes = Signal::where('created_at', '>', $fechaMes)
                                ->where('estado', 1)->count();
        $MesActualPerdidas = $MesActualCant - $MesActualActivas - $MesActualPendientes;
        
        
        
        /* SEMANA sumatoria porcentajes
        $a1 = Signal::where('created_at', '>', $fechaSemana)
                                ->where('estado', 2)->sum('porcentaje');
        $b1 = Signal::where('created_at', '>', $fechaSemana)
                                ->where('estado', 3)->sum('porcentaje');
        $porcSemana = $a1 - $b1;
        */
        //Mes actual sumatoria porcentjes
        $a1 = Signal::where('created_at', '>', $fechaMes)
                                ->where('estado', 2)->sum('porcentaje');
        $b1 = Signal::where('created_at', '>', $fechaMes)
                                ->where('estado', 3)->sum('porcentaje');
        $porcMesActual = $a1 - $b1;
        
        //sumatoria de porcentajes
        //mes anterior
        /*
        $a2 = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 2)->sum('porcentaje');
        $b2 = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 3)->sum('porcentaje');
        */
        //mes anterior y actual
        $a2 = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 2)->sum('porcentaje');
        $b2 = Signal::where('created_at', '>', $fechaInicio)
                                ->where('created_at', '<=', $fechaFin)
                                ->where('estado', 3)->sum('porcentaje');
                                
                                
        $porcMes = $a2 - $b2;

        
        return view('index', compact('MesActualCant', 'MesActualActivas', 
            'MesActualPendientes', 'MesCant', 'MesActivas', 'MesPendientes', 
            'porcMesActual', 'porcMes', 'mes', 'MesPerdidas', 'MesActualPerdidas'));
    }



    public function registro(Request $request)
    {

        if((User::where('email', $request->email)->count()) >= 1){
            $mensaje = 'El correo '.$request->email.' ya esta siendo utilizado en la plataforma!.  Por favor, ingresa otro correo.';
            return view('usuarios.register', ['mensaje'=> $mensaje]);
        }
        $user = new User();
        $user->role_id = 2;
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //usando el campo remember_token para confirmacion de usuario
        $codigo = str_random(30);
        $user->codigo = $codigo;
        $user->estado = 0;
        $user->save();
        Mail::send('usuarios.confirmacion', $user->toArray(), function($message) use ($user) {
        $message->to($user->email, $user->name)->subject('Por favor confirma tu correo');
        });
        return view('usuarios.cuentanueva');
        
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function confirmacion($codigo)
    {
        try{
            $user = User::where('codigo', $codigo)->firstOrFail();
            $user->estado = 1;
            $user->codigo = '';
            $user->update();
            return view('usuarios.confirmado');
        } catch (ModelNotFoundException $e){
            //el usuario no existe
            return view('usuarios.errorconfirmacion');
        }
    }
    public function hora()
    {
        $hora = Carbon::now(); 
        return response($hora);
    }
    
}
