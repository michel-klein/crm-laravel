@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Clientes - Listar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('clientes.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td><a href="{{ route('clientes.show', ['cliente'=>$cliente->id])}}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('clientes.destroy', ['cliente'=>$cliente->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('clientes.edit', ['cliente' => $cliente->id ])}}">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clientes->appends($request)->links() }}
        </div>
    </div>
</div>
@endsection
