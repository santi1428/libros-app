<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Book;



class UserController extends Controller
{

    public function index(){
        $libros = $this->obtenerLibros(Auth::user()->id);
        return view('mis-libros', ['libros' => $libros]);
    }

    public function registrarLibro($libroId, $nombre, $descripcion, $paginas, $autor){
        $libro = new Book;
        $libro->id = $libroId;
        $libro->nombre = $nombre;
        $libro->autor = $autor;
        $libro->descripcion = $descripcion;
        $libro->numero_de_paginas = $paginas;
        $libro->save();
    }

    public function existeLibro($libroId){
        $libro = Book::where('id', '=', intval($libroId))->first();
        if ($libro === null){
            return false;
        }
        return true;
    }

    public function obtenerLibros($usuarioId){
        $libros = DB::table('books')
            ->join('users_books', 'users_books.libro_id', '=', 'books.id')
            ->where('users_books.usuario_id', $usuarioId)
            ->get();
        return $libros;
    }

    public function agregarLibroDelUsuario($usuarioId, $libroId){
        $existeLibro =$this->existeLibroDelUsuario($usuarioId, $libroId);
        if(!$existeLibro){
            DB::table('users_books')->insert(
                ['usuario_id' => $usuarioId, 'libro_id' => $libroId]
            );
        }
    }

    public function existeLibroDelUsuario($usuarioId, $libroId){
        $existeLibro = DB::table('users_books')
            ->where(['usuario_id' => $usuarioId, 'libro_id' => $libroId])
            ->get();
        return count($existeLibro) > 0;
    }

    public function agregarLibro(Request $request){
        $libroId = $request->input('libroId');
        $usuarioId = $request->input('usuarioId');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $paginas = $request->input('paginas');
        $autor = $request->input('autor');
        $existeLibro = $this->existeLibro($libroId);
        if(!$existeLibro){
            $this->registrarLibro($libroId, $nombre, $descripcion, $paginas, $autor);
        }

        $this->agregarLibroDelUsuario($usuarioId, $libroId);
    }




}
