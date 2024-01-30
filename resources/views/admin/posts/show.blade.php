@extends('layouts.admin');

@section('content')


    <div class="container mt-5">

        <h2>{{ $post->title }}</h2>

        <div class="mt-4">
            Data: {{ $post->created_at}}
        </div>

        <div class="mt-4">
            Slug: {{ $post->slug }}
        </div>

        <p class="mt-4">
            {{ $post->content}}
        </p>
    </div>


@endsection