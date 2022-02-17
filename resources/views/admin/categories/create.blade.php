@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            
            <button type="submit" class="btn btn-primary mt-2">Nuovo</button>
        </form>
    </div>
@endsection