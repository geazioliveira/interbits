@extends('interbits::layouts.app')

@section('title', 'Listagem de Usuários')

@section('content')
    <h1>Listagem de usuários</h1>

    <a href="/register/add" class="btn btn-success">Adicionar novo usuário</a>
    <hr>

    <form method="get" action="/register/search/">
        <fieldset>
            <legend>Busca</legend>
            <label>Busque um usuário</label>
            <input type="text" name="query" class="large" placeholder="Digite um email, nome ou celular…" value="{{$query}}">
            <br/>
            <button type="submit" class="btn">Buscar</button>
        </fieldset>
    </form>

    @if(!$users->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Função</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->function}}</td>
                    <td>
                        <a href='mailto:{{$user->email}}'>
                            {{$user->email}}
                        </a>
                    </td>
                    <td>({{$user->ddd}}) {{$user->phone}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/register/edit/{{$user->id}}" class="btn btn-info">Editar</a>
                            <a href="/register/delete/{{$user->id}}" class="btn btn-danger" onclick="return confirm('Deseja excluir este usuário?')">Excluir</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div>
            Não foi encontrado nenhum usuário
        </div>
    @endif

@endsection