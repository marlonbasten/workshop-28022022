@extends('layouts.main')

@section('content')

    <h1>{{ __('Hello World!') }}</h1>

    <hr>

    {{-- Nicht escapen --}}
    {!! $name !!}

    <br>

    {{-- Escapen --}}
    {{ $name }}

    <hr>

    {{-- Blade if-statements --}}
    @if($corona)
        <p>Du darfst nicht ins Karneval!</p>
    @else
        <p>Viel Spaß beim Karneval!</p>
    @endif

    <hr>

    {{-- Blade foreach-statements --}}
    @include('includes.list', ['items' => $teilnehmer])

@endsection