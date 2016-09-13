@extends('interbits::layouts.app')

@section('title', 'Listagem de Funções')

@section('content')
    <h1>Listagem de funções</h1>

    <a href="/functions/add" class="btn btn-success">Adicionar nova função</a>
    <hr>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($functions as $function)
            <tr>
                <td>{{$function->id}}</td>
                <td>{{$function->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="/functions/edit/{{$function->id}}" class="btn btn-info">Editar</a>
                        <a href="/functions/delete/{{$function->id}}" class="btn btn-danger" onclick="return confirm('Deseja excluir está função?')">Excluir</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection