<?php

namespace ITHilbert\CookieDisclaimer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookieInfo extends Model
{
    use HasFactory;
    protected $table = 'cookie_infos';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = true;

    public static function getInfos(){
        $cis = CookieInfo::all();

        $ausgabe =  config('cookiedisclaimer.text');
        $ausgabe .= '<h3>Cookies</h3>';

        $anz = 0;
        foreach($cis as $ci){
            $anz++;
            $ausgabe .= '<p' . ($anz % 2 == 0 ? ' style="background-color:#ccc"' : '>');
            $ausgabe .= 'Cookie: ' . $ci->Cookie . '<br>';
            $ausgabe .= 'Anbieter: ' . $ci->Anbieter . '<br>';
            $ausgabe .= 'Typ: ' . $ci->Typ . '<br>';
            $ausgabe .= 'Zweck: ' . $ci->Zweck . ($ci->Hinweis != '' ? '<br><br>' . $ci->Hinweis : '') . '<br>';
            $ausgabe .= 'Speicherdauer: ' . $ci->Speicherdauer . '<br>';
            $ausgabe .= '<p>';
        }

        return $ausgabe;
    }

}
