<?php
use ITHilbert\CookieDisclaimer\Models\CookieInfo;
?>

@extends('layouts.law_pages')

@section('head.titel', config('site.firma'). " – Cookie Richtlinie")
@section('head.keywords', "")
@section('head.description', config('site.firma') .", Cookie Richtlinie")
@section('meta')
    @include('header.robots_disallow')
@stop


@section('main')
    <h1>Cookie-Statistik</h1>
    <table border="1">
        <tr>
            <td colspan="3" align="center"><b>Cookies erlaubt</b></td>
        </tr>
        <tr>
            <td width="100px">Erlaubt</td>
            <td width="30px" align="right">{{ $infos->allow }}</td>
            <td width="100px" align="right">{{ number_format($infos->allow / $infos->gesamt * 100,2)  }} %</td>
        </tr>
        <tr>
            <td>Nicht Erlaubt</td>
            <td align="right">{{ $infos->disallow }}</td>
            <td align="right">{{ number_format($infos->disallow / $infos->gesamt * 100,2) }} %</td>
        </tr>
        <tr>
            <td>Gesamt</td>
            <td align="right">{{ $infos->gesamt  }}</td>
            <td align="right">100,00 %</td>
        </tr>
    </table>
    <br>
    <br>
    <div class="row">
        <div class="col">
            <h2>Besucher {{ date('Y') }}</h2>
            <table border="1">
                <tr>
                    <th align="center"><b>Jahr</b></th>
                    <th align="center"><b>Monat</b></th>
                    <th align="center"><b>Besucher</b></th>
                </tr>
                @foreach ($besucher as $b)
                    <tr>
                        <td align="center">{{ $b->Jahr }}</td>
                        <td align="center">{{ $b->Monat }}</td>
                        <td align="center">{{ $b->Besucher }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col">
            <h2>Besucher {{ date('Y')-1 }}</h2>
            <table border="1">
                <tr>
                    <th align="center"><b>Jahr</b></th>
                    <th align="center"><b>Monat</b></th>
                    <th align="center"><b>Besucher</b></th>
                </tr>
                @foreach ($besucherVJ as $b)
                    <tr>
                        <td align="center">{{ $b->Jahr }}</td>
                        <td align="center">{{ $b->Monat }}</td>
                        <td align="center">{{ $b->Besucher }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h2>Seitenbesucher {{ date('Y') }}</h2>
            <table border="1">
                <tr>
                    <th align="center"><b>Seite</b></th>
                    <th align="center"><b>Besucher</b></th>
                </tr>
                @foreach ($seiten as $s)
                    <tr>
                        <td align="center">{{ $s->Seite }}</td>
                        <td align="center">{{ $s->Besucher }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col">
            <h2>Seitenbesucher {{ date('Y')-1 }}</h2>
            <table border="1">
                <tr>
                    <th align="center"><b>Seite</b></th>
                    <th align="center"><b>Besucher</b></th>
                </tr>
                @foreach ($seitenVJ as $s)
                    <tr>
                        <td align="center">{{ $s->Seite }}</td>
                        <td align="center">{{ $s->Besucher }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>




@endsection

