@extends('interbits::layouts.app')

@section('title', 'Adivionar um novo usuário')

@section('content')
    <h1>Editar usuário {{$user->name}}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="/register/add">

        {{ csrf_field() }}

        <div class="control-group">
            <label class="control-label" for="name">Nome</label>
            <div class="controls">
                <input type="text" id="name" name="name" placeholder="Nome" value="{!! $user->name !!}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="function">Função</label>
            <div class="controls">
                <select name="function_id" id="function">
                    <option value="">Selecione uma função</option>
                    @foreach($functions as $function)
                        @if($user->function_id == $function->id)
                            <option value="{{$function->id}}" selected>{{$function->name}}</option>
                        @else
                            <option value="{{$function->id}}">{{$function->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="email" name="email" id="email" placeholder="Email" value="{!! $user->email !!}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="ddd">DDD</label>
            <div class="controls">
                <input type="number" name="ddd" id="ddd" min="0" max="99" placeholder="Ex. 11" value="{!! $user->ddd !!}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="phone">Telefone</label>
            <div class="controls">
                <input type="number" name="phone" id="phone" min="0" max="999999999" placeholder="Ex. 960768689" value="{!! $user->phone !!}">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Senha</label>
            <div class="controls">
                <input type="password" name="password" id="password" minlength="8" maxlength="15" placeholder="Senha">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="rePassword">Repita a Senha</label>
            <div class="controls">
                <input type="password" name="rePassword" id="rePassword" minlength="8" maxlength="15" placeholder="Digite a mesma senha acima">
            </div>
        </div>

        <div class="control-group">
            <button type="reset" class="btn">Cancelar</button>
            <button type="submit" class="btn">Salvar</button>
        </div>
        </div>
    </form>

@endsection