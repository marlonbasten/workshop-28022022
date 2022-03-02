@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Posts</h2>

                        <ul>
                            @foreach($posts as $post)
                                <li>
                                    {{ $post->title }}
                                    - {{ $post->likes->count() }} Like(s)
                                    - @foreach($post->likes->sortBy('id')->take(3) as $like) {{ $like->name }} @endforeach
                                    - <a href="{{ route('post.like', ['id' => $post->id]) }}">
                                        {{ $post->likes->find(auth()->id()) ? 'Like entfernen' : 'Like' }}
                                    </a>
                                    - <a href="{{ route('post.destroy', ['post' => $post->id]) }}">Löschen</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
