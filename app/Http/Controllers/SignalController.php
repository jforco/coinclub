<?php

namespace App\Http\Controllers;

use App\Signal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class SignalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $signals = Signal::orderBy('created_at', 'desc')->get();
            return view('signals.index', compact('signals'));
        } else {
            $fechaMes = Carbon::now()->startOfMonth();
            $signals = Signal::where('created_at','<',$fechaMes)
                        ->orderBy('created_at', 'desc')->get();
            return view('signals.index', compact('signals'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prueba(){
        $users = User::all();
        /*$tokens = $users->reject(function ($user) {
            return ($user->estado <> 1) and ($user->token == "");
        })
        ->map(function ($user) {
            return $user->token;
        });*/
        
        $tokens = DB::table('users')
                    ->where('token', '<>', '')
                    ->where('estado', 1)->pluck('token');
        return $tokens;
    }

    public function create(Request $request)
    {
        //

        $signal = new Signal;
        $signal->nombre = $request->nombre;
        $signal->descripcion = $request->descripcion;
        $signal->moneda = $request->moneda;
        $signal->mercado = $request->mercado;
        $signal->entrada = $request->entrada;

        $body = "Nombre : " . $signal->nombre .
            "Entrada : " . $signal->entrada .
            "Descripcion : " . $signal->descripcion .
            "Moneda : " . $signal->moneda .
            "Mercado : " . $signal->mercado;


        /*if($signal->save()){
            $tokens[] = "fYc5l1CHdb4:APA91bHGsDe_sQZrq7JCdYF-8wakYLHKe1QEgdG-pxEcvX_s9itjvg3SOhr4SU8hexb5rhpxoBHU517HEjY4KeNQv_2UZnAvobMJWwXCJm1RiKbQzl9FQpymX24rvjoFsksOlgz3OPGX";
            $notification = array(
                "title" => "Mandado desde el servidor de laravel",
                "body" => $body
            );
            $message = array("message" => "Message from serve", "customKey" => "customValue");
            $url = "https://fcm.googleapis.com/fcm/send ";
            $fields = array(
                "registration_ids" => $tokens,
                "notification" => $notification,
                "data" => $message
            );
            $header = array(
                'Content-Type: application/json',
                'Authorization: key=AAAAlC-GW6c:APA91bHL6CQVJUneNQAUIatvvQOtxPZDjSEPv1D2Ntk2XDKOdUcN1WWOkxKNDiVJyPkJzdLIPn8f_A7gLlA6aYP4rekwxKUa6NBWKG1LCw1_3NN4iEilzSrQl9JsYuk76Jvp3cSobcMM'
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);

            if($result == false){
                die('Curl failed : ' . curl_error($ch));
            } else {
                echo 'envio con exito';
            }
            curl_close($ch);
        }*/

        return response('mmm');
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
     * @param  \App\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function show(Signal $signal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function edit(Signal $signal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signal $signal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signal  $signal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signal $signal)
    {
        //
    }
}
