@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Posts List</h3>
                    <a href="{{route('posts.create')}}">
                        <button type="button" class="btn btn-primary">Nuovo</button>
                    </a>
                </div>

                <div class="card-body">
                   <ul class="posts_list">
                       @foreach ($posts as $post)
                           <li>
                               <div class="head_post d-flex justify-content-between">
                                    <div class="title">
                                        <h2>{{$post->title}}</h2>
                                        <h5>{{$post->slug}}</h5>
                                    </div>
                                    <div class="buttons d-flex justify-content-between align-items-center">
                                        <a href="{{route('posts.show', $post->id)}}">
                                            <button type="button" class="btn btn-success">Visualizza</button>
                                        </a>

                                        <a href="{{route('posts.edit', $post->id)}}">
                                            <button type="button" class="btn btn-warning mx-2">Modifica</button>
                                        </a>

                                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                               </div>

                               @if ($post->image)
                                    <div class="image w-100">
                                        <img class="w-100" src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
                                    </div>  
                               @endif
                               
                               <p class="my-3">{{$post->content}}</p>

                               <div class="info_post d-flex justify-content-between align-items-center">
                                    <div class="date">{{$post->updated_at}}</div>

                                    {{-- @dd($categories) --}}
                                    {{-- @dd($post->category) --}}

                                    @if ($post->category)
                                        <span class="badge badge-primary">{{$post->category->name}}</span>
                                    @else
                                        <span class="badge badge-primary">Nessuna Categoria</span>
                                    @endif

                                    <div class="published">

                                        @if ($post->published)
                                                <span class="badge badge-success">Publicato</span>
                                        @else
                                                <span class="badge badge-secondary">Non Publicato</span>
                                        @endif
                                    </div>
                               </div>
                           </li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection