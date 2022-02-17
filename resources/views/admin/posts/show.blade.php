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

    <div class="content my-2">
        <strong>Contenuto :</strong>
        <p class="d-inline-block">{{$post->content}}</p>
    </div>

    <div class="date my-2">
        <div class="created"><strong>Data creazione :</strong> <span>{{$post->created_at}}</span></div>
        <div class="updated"><strong>Ultima modifica :</strong> <span>{{$post->updated_at}}</span></div>
    </div>

    <div class="published">
        @if ($post->published)
             <span class="badge badge-success">Publicato</span>
        @else
             <span class="badge badge-secondary">Non Publicato</span>
        @endif
    </div>
</div>
@endsection