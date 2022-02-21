@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror mb-1" id="title" name="title" aria-describedby="emailHelp" value="{{old('title')}}">
          @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror mb-1" id="content" name="content" rows="8">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
              <option value="">Scegli una Categoria</option>
              
              @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
          <input type="checkbox" class="form-check-input" id="published" name="published" {{old('published') ? 'checked' : ''}}>
          <label class="form-check-label" for="published">Pubblica</label>
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>
      </form>
</div>
@endsection