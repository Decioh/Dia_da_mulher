<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Assistida;
use App\Models\Servico;
use App\Models\Cidade;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class AssistidaController extends Controller
{
    public function create()
    {
        $cidades = DB::table('cidades')->get();

        $assistidas = DB::table('assistidas')->get();

      return view('cadastro',['cidades'=>$cidades, 'assistidas'=>$assistidas]);
    }
    public function store(Request $req)
    {
        $nome = $req->nome;
        $tel = $req->tel;
        $cidade = $req->cidade;

        $assistida = new Assistida();

        $assistida->nome = $nome;
        $assistida->tel = $tel;
        $assistida->cidade = $cidade;

        $assistida->save();
    }
}
