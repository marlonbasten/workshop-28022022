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
    <ul>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>

    {{ $posts->links() }}

    <hr>

    <form action="{{ route('storePostRoute') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Titel">
        <br>
        <textarea name="content" placeholder="Content"></textarea>
        <br>
        <input type="submit" value="Post speichern">
    </form>

@endsection