@extends('layouts.app')
<title>Mis libros</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-auto"><h4>Lista de libros agregados</h4></div>
        </div>
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
                        @foreach ($libros as $libro)
                            <tr>
                                <td>{{$libro->nombre }}</td>
                                <td>{{ html_entity_decode(substr($libro->descripcion, 0, 200)) }}</td>
                                <td>{{$libro->autor}}</td>
                                <td>{{$libro->numero_de_paginas}}</td>
                                <td>
                                    <button class="btn btn-danger mb-2" title="Eliminar"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
