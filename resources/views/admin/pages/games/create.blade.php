@extends('adminlte::page')

@section('title', 'Cadastrar Jogo')

@section('content_header')
    <h1>Cadastrar Jogo</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Novo Jogo</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('games.store') }}" class="form" method="POST">
                    @include('admin.pages.games._partials.form')
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
@endsection
