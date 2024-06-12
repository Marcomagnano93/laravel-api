@extends('layouts.app')

@section('title','Modifica')

@section('content')

    <div class="container my-4">
        <h1 class="my-5">Modifica tipologia: {{ $tecnology->name }}</h1>
        <form action="{{route('admin.technologies.update', $tecnology)}}" method="POST">
            @csrf
            @method('PUT')            
            <div class="mb-3 my-4">
                <label for="name" class="form-label h5">Nome Tipologia: </label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $tecnology->name)}}">
            </div>

            <div class="d-flex gap-3 my-4">
                <a href="{{route('admin.technologies.index')}}" class="btn btn-primary btn-lg">Indietro</a>
                <button type="submit" class="btn btn-warning btn-lg">Salva modifica</button>
            </div>
    
        </form>
    
        <div class="my-4">
            @if ( $errors->any() )
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
@endsection