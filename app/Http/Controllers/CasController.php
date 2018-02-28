<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasController extends Controller
{

    public function login(Request $req)
    {
        $service = $req->input('service');
        $ticket = 'ST-12345678';
        if (str_contains($service, '?')) {
            $service .= '&';
        } else {
            $service .= '?';
        }
        $service .= 'ticket=' . $ticket;

        return redirect($service);
    }

    public function ticketValidator(Request $req)
    {
        $xmlFile = env('CAS_AUTH_XML', 'resources/cas-auth.xml');
        return response(file_get_contents(base_path($xmlFile)), 200)->header('Content-type', 'text/xml');
    }


}
