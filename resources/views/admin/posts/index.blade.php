@extends('layouts.admin');

@section('content')
<div class="container mt-5">

  <h2>La lista dei post</h2>

  <div class="text-end">
    <a class="btn btn-secondary" href="{{ route('admin.posts.create') }}">Crea un nuovo post</a>
  </div>

  @if (session('message'))

  <div class="alert alert-danger mt-4">
      {{ session('message') }}
  </div>
      
  @endif

  <table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Data</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->created_at }}</td>
        <td>
          <a class="btn btn-success" href="{{ route('admin.posts.show', ['post' => $post->slug]) }}">Dettagli</a>
          <a class="btn btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->slug]) }}">Modifica</a>

          <form class="d-inline-block " action="{{ route('admin.posts.destroy', ['post' => $post->slug]) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Cancella</button>

          </form>


        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection