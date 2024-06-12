@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
<div class="container">
    <div class="d-flex gap-4 py-3">
    <h1>Progetti</h1>
    <a href="{{route('admin.dashboards.create')}}" class="btn btn-success btn-lg">Aggiungi un progetto</a>
    </div>
   

    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black-50">Titolo</th>
          <th scope="col" class="text-black-50">GitHub</th>
          <th scope="col" class="text-black-50">Tipo</th>
          <th scope="col" class="text-black-50">Tecnologie</th>
          <th scope="col" class="text-black-50">Descrizione</th>
          <th scope="col" class="text-black-50">Modifica</th>
          <th scope="col" class="text-black-50">Elimina</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dashboards as $dashboard)
          <tr>
              <th scope="row">
                <a href="{{route('admin.dashboards.show', $dashboard)}}">{{ $dashboard->title }}</a>
                </th>
              <td>
                <a href="{{ $dashboard->git }}">Link</a>
              </td>
              <td>
                <span>{{ $dashboard->type ? $dashboard->type->name : '' }}</span>
              </td>
              <td>
                    @foreach($dashboard->tecnologies as $tecnology) 
                    <span>-{{ $tecnology->name }}-</span>
                    @endforeach
              </td>
              <td>
                <a href="{{route('admin.dashboards.show', $dashboard)}}" class="btn btn-primary btn">Dettagli</a>
              </td>
              <td>
                <a href="{{route('admin.dashboards.edit', $dashboard)}}" class="btn btn-warning btn">Modifica</a>
              </td>
              <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                  Elimina
              </button>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabel">Sei sicuro di eliminare il progetto?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Annulla</button>
                            <form action="{{route('admin.dashboards.destroy', $dashboard)}}" method="POST">
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