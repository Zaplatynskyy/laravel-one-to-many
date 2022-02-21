@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
              <option value="">Scegli una Categoria</option>
              
              @foreach ($categories as $category)
                @php
                    $variable = $post->category_id;

                    if (old('category_id')) {
                        $variable = old('category_id');
                    }
                @endphp

                <option value="{{$category->id}}" {{$variable == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" class="form-control-file @error('category_id') is-invalid @enderror" id="image" name="image">
            @error('image')
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