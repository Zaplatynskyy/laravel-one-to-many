@extends('layouts.app')

@section('content')
<div class="container">
    <div class="titolo my-2">
        <strong>Titolo :</strong>
        <h2 class="d-inline-block">{{$post->title}}</h2>
    </div>

    <div class="slug my-2">
        <strong>Slug :</strong>
        <h5 class="d-inline-block">{{$post->slug}}</h5>
    </div>
    
    @if ($post->image)
        <div class="image w-50 my-2">
            <img class="w-100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
        </div>  
    @endif

    <div class="content my-2">
        <strong>Contenuto :</strong>
        <p class="d-inline-block">{{$post->content}}</p>
    </div>

    <div class="date my-2">
        <div class="created"><strong>Data creazione :</strong> <span>{{$post->created_at}}</span></div>
        <div class="updated"><strong>Ultima modifica :</strong> <span>{{$post->updated_at}}</span></div>
    </div>

    <div class="categories_published">
        @if ($post->category)
            <span class="badge badge-primary">{{$post->category->name}}</span>
        @else
            <span class="badge badge-primary">Nessuna Categoria</span>
        @endif

        @if ($post->published)
             <span class="badge badge-success">Publicato</span>
        @else
             <span class="badge badge-secondary">Non Publicato</span>
        @endif
    </div>
</div>
@endsection