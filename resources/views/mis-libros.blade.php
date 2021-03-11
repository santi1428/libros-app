@extends('layouts.app')
<title>Mis libros</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-auto"><h4>Lista de libros agregados</h4></div>
        </div>
            @if($eliminado)
            <div class="row">
                <div class="col">
                    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    <strong>Borrado. </strong> Tu libro se acaba de borrar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endif
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Cant. paginas</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($libros) > 0)
                            @foreach ($libros as $libro)
                                <tr>
                                    <td>{{$libro->nombre }}</td>
                                    <td>{{ html_entity_decode(substr($libro->descripcion, 0, 200)) }}</td>
                                    <td>{{$libro->autor}}</td>
                                    <td>{{$libro->numero_de_paginas}}</td>
                                    <td>
                                        <form action="{{ url('/borrar', ['libroId' => $libro->libro_id]) }}" method="post">
                                           <input class="btn btn-danger" type="submit" value="Delete" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                                <p>No hay libros agregados</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
