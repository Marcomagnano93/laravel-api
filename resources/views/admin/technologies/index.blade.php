@extends('layouts.app')

@section('title', 'Tech')

@section('content')
<div class="container">
    <div class="d-flex gap-4 py-3">
        <h1>Tecnologie: </h1>
        <a href="{{route('admin.technologies.create')}}" class="btn btn-success btn-lg">Aggiungi Tecnologia</a>
    </div>
   

    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black-50">Nome</th>
          <th scope="col" class="text-black-50">Modifica</th>
          <th scope="col" class="text-black-50">Elimina</th>
        </tr>
      </thead>
      <tbody>
        @foreach($technologies as $tecnology)
          <tr>
            <th scope="row">
                <span>{{ $tecnology->name }}</span>
            </th>
            <th scope="row">
                <a href="{{ route('admin.technologies.edit', $tecnology) }}" class="btn btn-warning">Modifica</a>
            </th>
            <th>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                    Elimina
                </button>
            </th>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabel">Sei sicuro?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{route('admin.technologies.destroy', $tecnology)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection