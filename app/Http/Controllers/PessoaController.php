<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;


class PessoaController extends Controller
{
    public function store(Request $req){

        $p = new Pessoa;
        $p->nome = $req->input('nome');
        $p->save();

        return redirect()->back()->with('msg','Cadastro Realizado com Sucesso!!!');
    
    }

    public function listarpessoas(){
        $pessoas = Pessoa::All();
        return view('listar_pessoas',['pessoas'=>$pessoas]);
    }

    public function excluir(Request $request, $id)
    {
        $pessoa = Pessoa::find($id);

        $pessoa->update([
            'nome' => $request->nome,
        ]);

        $pessoas = Pessoa::All();
        return view('listar_pessoas', ['pessoas' => $pessoas]);
    }

}
