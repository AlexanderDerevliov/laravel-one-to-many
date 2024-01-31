@extends('layouts.admin');


@section('content')
    <div class="container mt-5">

        <h2>Crea un nuovo post</h2>
        
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)

                  <li>{{ $error }}</li>
                      
                  @endforeach

                </ul>
            </div>
        @endif --}}

        <form class="mt-5" action="{{ route('admin.posts.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">

                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" rows="3" name="content"> {{ old('content') }}</textarea>
            </div>


            <div class="mb-3 has-validation">
                <label for="category">Seleziona Categoria: </label>
                <select class="form-select" @error('title') is-invalid @enderror" name="category_id" id="category">
                    <option @selected(!old('category_id')) value="">Nessuna Categoria</option>
                    @foreach ($categories as $category)
                         <option @selected(old('category_id') == $category->id) value="{{$category->id}}">{{$category->name}}</option>                        
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Salva</button>
        </form>

    </div>
@endsection
