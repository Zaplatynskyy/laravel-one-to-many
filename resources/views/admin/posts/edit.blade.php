@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror mb-1" id="title" name="title" aria-describedby="emailHelp" value="{{old('title') ? old('title') : $post->title}}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror mb-1" id="content" name="content" rows="8">{{old('content') ? old('content') : $post->content}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-check">
            @php
                $variable = old('published') ? old('published') : $post->published;
            @endphp

            <input type="checkbox" class="form-check-input" id="published" name="published" {{$variable ? 'checked' : ''}}>
            <label class="form-check-label" for="published">Pubblica</label>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>
</div>
@endsection