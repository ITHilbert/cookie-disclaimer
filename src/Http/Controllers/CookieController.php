<?php
namespace ITHilbert\CookieDisclaimer\Http\Controllers;

use ITHilbert\CookieDisclaimer\Models\CookieInfo;
use ITHilbert\CookieDisclaimer\Models\CookieScript;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CookieController extends Controller
{

    public function loadScripteAfterCookiesAllow(Request $request){
        $scipte = CookieScript::all();

        $ausgabe = '';
        foreach($scipte as $sc){
            $ausgabe .=  $sc->script ."\n";
        }

        $msg = array('status' => 'Okay', 'msg' => "Okay", 'script' => $ausgabe );
        return json_encode($msg);
    }

    public function loadCookieInfos(Request $request){
        $ausgabe = CookieInfo::getInfos();

        $msg = array('status' => 'Okay', 'msg' => "Okay", 'info' => $ausgabe );
        return json_encode($msg);
    }

    public function cookieRichtlinie(Request $request){
        $active = '';

        return view('cookiedisclaimer::cookieRichtlinie')->with(compact('active'));;
    }

}
