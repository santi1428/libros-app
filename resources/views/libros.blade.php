@extends('layouts.app')
<meta name="user-id" content="{{ Auth::user()->id }}">
<title>Libros</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div id="app">
                <inicio></inicio>
            </div>
        </div>
    </div>
</div>

@endsection
