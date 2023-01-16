@extends('app.layouts.basico')

@section('titulo', 'Produtos do pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
            <p>Produtos do pedido - Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedidos.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <h4>Detalhes do pedido</h4>
        <p>Id do pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>
        <div style="width: 30%; margin-left: auto; margin-right: auto">
        <h4>Itens do pedido</h4>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do produto</th>
                    <th>Data de inclusão do item no pedido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->pivot->created_at }}</td>
                        <td>
                            <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produtos.destroy', ['pedidoProduto'=>$produto->pivot->id, 'pedido_id'=>$pedido->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            @component('app.pedido_produtos._components.form_create', ['pedido'=>$pedido, 'produtos'=>$produtos])
            @endcomponent
        </div>
    </div>
</div>
@endsection
