<?php
namespace ITHilbert\CookieDisclaimer\Http\Controllers;

//use ITHilbert\LaravelKit\Helpers\hLogger;
use ITHilbert\CookieDisclaimer\Models\CookieInfo;
use ITHilbert\CookieDisclaimer\Models\CookieScript;
use ITHilbert\CookieDisclaimer\Models\CookieStat;
use ITHilbert\LaravelKit\App\Helpers\Browser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CookieController extends Controller
{
    public function cookiesAllowStat(Request $request){
        //hLogger::Log($request->cookie_allow);

        $stat = new CookieStat();
        $stat->visitorID = Browser::getID();
        $stat->ip = Browser::getIP();
        $stat->sprache = Browser::getSprache();
        $stat->sprachelang = Browser::getSpracheLong();
        $stat->browser = Browser::getBrowser();
        $stat->agent = Browser::getAgent();
        $stat->platform = Browser::getPlatform();
        $stat->url = Browser::getURL();
        $stat->previos = Browser::getURLBevor();
        $stat->isRobot = Browser::isRobot();
        $stat->isMobil = Browser::isMobil();
        if($request->cookie_allow == "true"){
            $stat->cookie_allow = 1;
        }else{
            $stat->cookie_allow = 0;
        }
        $erg = $stat->save();

        if($erg == 1){
            $msg = array('status' => 'Okay', 'msg' => "Okay");
        }else{
            $msg = array('status' => 'Error', 'msg' => "Fehler beim Speichern");
        }

        return json_encode($msg);
    }


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
