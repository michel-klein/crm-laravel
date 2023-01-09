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
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();

        return view('site.contato');
    }
}
