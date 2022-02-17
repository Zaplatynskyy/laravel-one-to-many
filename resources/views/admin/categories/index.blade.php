@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Categories List</h3>
                        <form action="{{route('categories.store')}}" method="POST" class="d-flex align-items-center">
                            @csrf
                            
                            @error('name')
                                <div class="alert alert-danger my_alert">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control my_input @error('name') is-invalid @enderror" id="name" name="name">
                            
                            
                            <button type="submit" class="btn btn-primary ml-2">Nuovo</button>
                        </form>
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