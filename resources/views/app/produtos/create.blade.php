@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
            <p>Produtos - Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto">
            @component('app.produtos._components.form_create_edit', ['unidades'=>$unidades])
            @endcomponent
        </div>
    </div>
</div>
@endsection
