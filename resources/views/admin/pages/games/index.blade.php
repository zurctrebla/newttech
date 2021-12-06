@extends('adminlte::page')

@section('title', 'Jogos')

@section('content_header')
    <div class="container-fluid">
        @include('admin.includes.alerts')
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Listar</h3>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{ route('games.create') }}" class="btn btn-outline-success btn-sm">Cadastrar</a>
            </ol>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <form action="{{ route('games.search') }}" method="POST" class="form form-inline">
                            @csrf
                            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                            <button type="submit" class="btn btn-dark">Filtrar</button>
                        </form>
                    </div>
                        <div class="card-body">
                            <table id="games" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($games as $game)
                                        <tr>
                                            <td>{{ $game->name }}</td>
                                            <td class="text-center">
                                                <span class="d-none d-md-block">
                                                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                    @can('game-edit')
                                                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                                                    @endcan
                                                    @can('game-delete')
                                                        <form action="{{ route('games.destroy', $game->id) }}" style="display:inline" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar o jogo?')" >Apagar</button>
                                                        </form>
                                                    @endcan
                                                    <a href="{{ route('games.permissions', $game->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                                                </span>
                                                <div class="dropdown d-block d-md-none">
                                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                        <a href="{{ route('games.show', $game->id) }}" class="dropdown-item">Visualizar</a>
                                                        @can('game-edit')
                                                            <a href="{{ route('games.edit', $game->id) }}" class="dropdown-item">Editar</a>
                                                        @endcan
                                                        @can('game-delete')
                                                            <button class="dropdown-item" onclick="return confirm('Deseja apagar o jogo?')">Apagar</button>
                                                        @endcan
                                                        <a href="{{ route('games.permissions', $game->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            @if (isset($filters))
                                {!! $games->appends($filters)->links() !!}
                            @else
                                {!! $games->links() !!}
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop
