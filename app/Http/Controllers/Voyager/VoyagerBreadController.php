<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Events\BreadDataAdded;
use App\Signal;
use App\User;

class VoyagerBreadController extends BaseVoyagerBreadController
{
    //editando todo

    public function store(Request $request)
    {
        
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            //LANZAR NOTIFICACION
            if($slug=='signals'){
                
                $body = "Nombre : " . $request->nombre . "\n" .
                    "Descripcion : " . $request->descripcion . "\n" .
                    "Moneda : " . $request->moneda . "\n" .
                    "Mercado : " . $request->mercado. "\n" .
                    "Entrada : " . $request->entrada . "\n" .
                    "Salida1 : " . $request->salida1 . "\n" .
                    "Salida2 : " . $request->salida2 . "\n" .
                    "Salida3 : " . $request->salida3 . "\n" .
                    "Stop : " . $request->stop;
                
                $tokens = DB::table('users')
                    ->where('token', '<>', '')
                    ->where('estado', 1)->pluck('token');
                    //return $tokens;
                //lanzando notificacion
                    $notification = array(
                        "title" => "Nueva Señal! - Coinclub",
                        "body" => $body
                    );
                    $message = array("message" => "Message from serve", "customKey" => "customValue");
                    $signal = new Signal;
                    $signal->nombre = $request->nombre;
                    $signal->descripcion = $request->descripcion;
                    $signal->moneda = $request->moneda;
                    $signal->mercado = $request->mercado;
                    $signal->entrada = $request->entrada;
                    $signal->salida1 = $request->salida1;
                    $signal->salida2 = $request->salida2;
                    $signal->salida3 = $request->salida3;
                    $signal->stop = $request->stop;
                    $url = "https://fcm.googleapis.com/fcm/send";
                    
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
                        return 'error'. curl_error($ch);
                        die('Curl failed : ' . curl_error($ch));
                    } else {
                        return 'exito!';
                        echo 'envio con exito';
                    }
                    curl_close($ch);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }
}
