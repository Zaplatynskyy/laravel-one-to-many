@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Categories List</h3>
                        {{-- <a href="{{route('posts.create')}}">
                            <button type="button" class="btn btn-primary">Nuovo</button>
                        </a> --}}
                    </div>
    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Slug</th>
                                {{-- <th scope="col">Handle</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th>{{$category->id}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection