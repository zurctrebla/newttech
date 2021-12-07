@extends('adminlte::page')

@section('title', 'Cadastrar Localizador')

@section('content_header')
    <h1>Cadastrar Localizador</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Novo Localizador</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('locators.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.locators._partials.form')
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
@endsection
