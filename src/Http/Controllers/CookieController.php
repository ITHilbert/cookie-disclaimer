<?php
namespace ITHilbert\CookieDisclaimer\Http\Controllers;

//use ITHilbert\LaravelKit\Helpers\hLogger;
use ITHilbert\CookieDisclaimer\Models\CookieInfo;
use ITHilbert\CookieDisclaimer\Models\CookieScript;
use ITHilbert\CookieDisclaimer\Models\CookieStat;
use ITHilbert\LaravelKit\Helpers\Browser;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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

        return view('cookiedisclaimer::cookieRichtlinie')->with(compact('active'));
    }

    public function cookieStatistik(Request $request){
        $active = '';

        //Statistik Cookies ja/nein
        $infos = (object)[
            'allow' => CookieStat::where('isRobot',0)->where('cookie_allow', 1)->count() ?? 0,
            'disallow' => CookieStat::where('isRobot',0)->where('cookie_allow', 0)->count() ?? 0,
        ];

        $infos->gesamt = $infos->allow + $infos->disallow;

        //Auswertung nach Monaten
        $besucher = DB::select( DB::raw('SELECT year(`created_at`) as Jahr, month(`created_at`) as Monat, COUNT(id) AS Besucher FROM `cookie_statistics` GROUP BY year(`created_at`), month(`created_at`) ORDER BY year(`created_at`) DESC, month(`created_at`) DESC'));

        //Auswertung nach Seiten
        $seiten = DB::select( DB::raw('SELECT `previos` AS Seite, COUNT(`id`) As Besucher
                                         FROM `cookie_statistics`
                                         WHERE year(`created_at`)='. date("Y") .'
                                         GROUP BY `previos`, year(`created_at`)
                                         ORDER BY COUNT(id)'));



        return view('cookiedisclaimer::cookieStatistik')->with(compact('active', 'infos', 'besucher', 'seiten'));
    }


}
