<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        $motivo_contato = MotivoContato::all();
        return view('site.contato', ['motivo_contato'=>$motivo_contato]);
    }

    public function salvar(Request $request) {
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ],[
            'required' => 'O campo :attribute é obrigatório',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres'
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
