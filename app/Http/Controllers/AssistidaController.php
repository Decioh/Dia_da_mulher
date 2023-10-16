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

    public function index(){
        
        $search = request('search');
            if($search){
                $assistidas = DB::table('assistidas')
                    ->where('nome', 'like', '%'.$search.'%')
                    ->orWhere('tel', 'like','%'.$search.'%')->simplePaginate(20);
            }
            else{
                $assistidas = Assistida::orderBy('nome', 'asc')->simplePaginate(20);
            }
        $cidades = DB::table('cidades')->get();
    return view ('home', ['assistidas'=>$assistidas, 'search'=>$search, 'cidades'=>$cidades]);
    }

    public function create()
    {
        $cidades = DB::table('cidades')->get();

        $assistidas = DB::table('assistidas')->get();

      return view('cadastro',['cidades'=>$cidades, 'assistidas'=>$assistidas]);
    }
    public function store(Request $req)
    {

        $assistida = new Assistida();

        $assistida->nome       = $req->nome;
        $assistida->tel        = $req->tel;
        $assistida->cidades_id = $req->cidade;
        $assistida->email      = $req->email;

        $assistida->save();

        $assistida_id = $assistida->id;

        $lanche              = $req->lanche;
        $acompanhada         = isset($req->acompanhada);
        $defensoria_publica  = isset($req->defensoria_publica);
        $cras                = isset($req->cras);
        $codhab              = isset($req->codhab);
        $senac               = isset($req->senac);
        $sesc_consulta       = isset($req->sesc_consulta);
        $sesc_sens           = isset($req->sesc_sens);
        $sesc_mamografia     = isset($req->sesc_mamografia);
        $sesc_odonto         = isset($req->sesc_odonto);
        $sesc_insercao_diu   = isset($req->sesc_insercao_diu);
        $sesc_citopatologico = isset($req->sesc_citopatologico);
        $sesc_enfermagem     = isset($req->sesc_enfermagem);
        $sedet               = isset($req->sedet);
        $secretaria_da_mulher= isset($req->secretaria_da_mulher);
        $sec_saude           = isset($req->sec_saude);
        $sejus_subav         = isset($req->sejus_subav);
        $delegacia_da_mulher = isset($req->delegacia_da_mulher);
        $fiocruz             = isset($req->fiocruz);

        $servico = new Servico();

        $servico->assistida_id        = $assistida_id;
        $servico->lanche              = $lanche;
        $servico->acompanhada         = $acompanhada;
        $servico->defensoria          = $defensoria_publica;
        $servico->cras                = $cras;
        $servico->codhab              = $codhab;
        $servico->senac               = $senac;
        $servico->sesc_consulta       = $sesc_consulta;
        $servico->sesc_sens           = $sesc_sens;
        $servico->sesc_mamografia     = $sesc_mamografia;
        $servico->sesc_odonto         = $sesc_odonto;
        $servico->sesc_insercao_diu   = $sesc_insercao_diu;
        $servico->sesc_citopatologico = $sesc_citopatologico;
        $servico->sesc_enfermagem     = $sesc_enfermagem;
        $servico->sedet               = $sedet;
        $servico->secretaria_da_mulher= $secretaria_da_mulher;
        $servico->sec_saude           = $sec_saude;
        $servico->sejus_subav         = $sejus_subav;
        $servico->delegacia_da_mulher = $delegacia_da_mulher;
        $servico->fiocruz             = $fiocruz;

        $servico->save();
    return redirect()->route('assistida.index');
    }
}
