@extends('interbits::layouts.app')

@section('title', 'Adivionar nova função')

@section('content')
    <h1>Adicionar função</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="/functions/add">

        {{ csrf_field() }}

        <div class="control-group">
            <label class="control-label" for="name">Nome</label>
            <div class="controls">
                <input type="text" id="name" name="name" placeholder="Nome" value="{!! old('name') !!}">
            </div>
        </div>

        <div class="control-group">
            <button type="reset" class="btn">Cancelar</button>
            <button type="submit" class="btn">Salvar</button>
        </div>
        </div>
    </form>

@endsection