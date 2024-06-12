@extends('layouts.app')

@section('title','Create')

@section('content')

    <div class="container">
    
        <h1 class="text-center fs-1">Modifica progetto: <br> {{ $dashboard->title }}</h1>
    
        <form action="{{route('admin.dashboards.update', $dashboard)}}" method="POST">
            @csrf

            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Titolo: </label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $dashboard->title)}}">
            </div>
            <div class="mb-3">
                <label for="git" class="form-label">GitHub: </label>
                <input type="text" class="form-control" id="git" name="git" value="{{old('git', $dashboard->git)}}">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipo:</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Seleziona un tipo</option>
                    @foreach($types as $type) 
                    <option @selected( $type->id == old('type->id', $dashboard->type_id) ) value="{{ $type->id }}"> {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text">Descrizione</span>
                <textarea class="form-control" aria-label="With textarea" name="description">{{ $dashboard->description }}</textarea>
            </div>
            <div class="form-group mb-3">
                <h5>Tecnologie utilizzate:</h5>
                <div class="d-flex gap-3">
                    @foreach ($tecnologies as $tecnology)

                    <div class="form-check">
                        <input @checked( in_array($tecnology->id, old('tecnologies',$dashboard->tecnologies->pluck('id')->all() )) ) name="tecnologies[]" class="form-check-input" type="checkbox" value="{{ $tecnology->id }}" id="tecnology-{{$tecnology->id}}">
                        <label class="form-check-label" for="tecnology-{{$tecnology->id}}">
                        {{ $tecnology->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex gap-3 my-4">
                <a href="{{route('admin.dashboards.index')}}" class="btn btn-primary btn-lg">Indietro</a>
                <button type="submit" class="btn btn-success btn-lg">Salva</button>
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