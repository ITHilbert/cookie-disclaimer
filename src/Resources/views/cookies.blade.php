@extends('layouts.master')

@section('head.titel', config('site.firma'). " – Cookies")
@section('head.keywords', "")
@section('head.description', config('site.firma') .", Cookies")
@section('meta')
    @include('header.robots_disallow')
@stop


@section('content')
<section class="section border-0 m-0 inhalt">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mb-10">
                <table class="table">
                    <tr>
                        <th>Cookie</th>
                        <th>Dauer</th>
                        <th>Typ</th>
                        <th>Herausgeber</th>
                        <th>Beschreibung</th>
                    </tr>
                    <tr>
                        <td>XSRF-TOKEN</td>
                        <td>1 Woche</td>
                        <td>Funktional</td>
                        <td>Laravel Framework</td>
                        <td>Sicherheitsfunktion von Laravel</td>
                    </tr>
                    <tr>
                        <td>[Domain]_session</td>
                        <td></td>
                        <td>Funktional</td>
                        <td>Laravel Framework</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>remember_web_*</td>
                        <td>1 Woche</td>
                        <td>Funktional</td>
                        <td>Laravel Framework</td>
                        <td>um Benutzereinstellungen zu speichern.</td>
                    </tr>
                    <tr>
                        <td>_ga</td>
                        <td>2 Jahre</td>
                        <td>Marketing</td>
                        <td></td>
                        <td>gtag.js Google</td>
                        <td>Used to distinguish users.</td>
                    </tr>
                    <tr>
                        <td>_gid</td>
                        <td>24 Stunden</td>
                        <td>Marketing</td>
                        <td>gtag.js Google</td>
                        <td>Used to distinguish users.</td>
                    </tr>
                    <tr>
                        <td>_ga_*</td>
                        <td>2 Jahre</td>
                        <td>Marketing</td>
                        <td>gtag.js Google</td>
                        <td>Used to persist session state.</td>
                    </tr>
                    <tr>
                        <td>_gac_gb_*</td>
                        <td>90 Tage</td>
                        <td>Marketing</td>
                        <td>gtag.js Google</td>
                        <td>Contains campaign related information. If you have linked your Google Analytics and Google Ads accounts, Google Ads website conversion tags will read this cookie unless you opt-out.</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</section>
@endsection
