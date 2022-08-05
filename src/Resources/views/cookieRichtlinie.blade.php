@extends('layouts.law_pages')

@section('head.titel', config('site.firma'). " – Cookie Richtlinie")
@section('head.keywords', "")
@section('head.description', config('site.firma') .", Cookie Richtlinie")
@section('meta')
    @include('header.robots_disallow')
@stop


@section('main')
    {!! CookieInfo::getInfos() !!}
@endsection

