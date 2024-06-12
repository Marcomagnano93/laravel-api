@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-4">
        <h1>{{ $dashboard->title }}</h1>
        <a href="{{route('admin.dashboards.index')}}" class="btn btn-primary btn-lg">Torna ai progetti</a>
    </div>
    
    <div class="row">

        <div class="card">
            <h3>Descrizione: </h3>
            <p>{{ $dashboard->description }}</p>
            <div>
                <p>Apri il progetto su <a href="{{ $dashboard->git }}">GitHub</a></p>
            </div>
            <div>
                <h5>Tecnologie utilizzate:</h5>
                <ul>
                    @foreach($dashboard->tecnologies as $tecnology) 
                    <li>{{ $tecnology->name }}</li>
                    @endforeach
                </ul>
            </div>
            
            <div class="my-3">
                <a href="{{route('admin.dashboards.edit', $dashboard)}}" class="btn btn-success btn">Modifica</a>
            </div>
        </div>
    </div>
</div>
@endsection