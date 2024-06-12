@extends('layouts.app')

@section('title','Crea tipologia')

@section('content')

    <div class="container my-4">   
        <form action="{{route('admin.types.store')}}" method="POST">
            @csrf            
            <div class="mb-3">
                <label for="name" class="form-label h3">Nuova Tipologia: </label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            </div>

            <div class="d-flex gap-3 my-4">
                <a href="{{route('admin.types.index')}}" class="btn btn-primary btn-lg">Indietro</a>
                <button type="submit" class="btn btn-success btn-lg">Crea</button>
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
    
    
    </div>




@endsection