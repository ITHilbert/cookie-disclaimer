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
@endsection

