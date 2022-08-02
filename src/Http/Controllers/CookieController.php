<?php
namespace ITHilbert\CookieDisclaimer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class CookieController extends Controller
{
    public function cookiesAllow(Request $request){
        $allow = $request->allow ?? false;

        //hLogger::Log($allow);

        session(['cookiesallow' => $allow]);

        $msg = array('status' => 'Okay', 'msg' => "Okay");
        return json_encode($msg);
    }

    public function cookiesAllowReset(Request $request){
        session()->forget('cookiesallow');

        //dd(session('cookiesallow'));
        return back();
    }
}
