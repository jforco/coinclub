<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;
use Illuminate\Support\Facades\Auth;


class VoyagerAuthController extends BaseVoyagerAuthController
{
    //
    public function login()
    {
        if (Auth::user()) {
        	
            return redirect()->route('voyager.dashboard');
        }

        return redirect('/Login');
    }

}
