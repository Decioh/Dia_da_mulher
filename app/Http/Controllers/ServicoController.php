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
use Carbon\Carbon;


class ServicoController extends Controller
{
    public function dashboard(){
        $ano = Carbon::now()->format('Y');
        $assistidas = Assistida::all()->count();  
        $servicos = Servico::all()->count(); 
        $ano = request('ano');    
        $mes_filter = request('mes_filter');
        $selected_month = 'todos os meses';

        /*Gráfico 1*/
        $servicos_mes = Servico::select([
            DB::raw('YEAR(updated_at) as year'),
            DB::raw('MONTH(updated_at) as mes'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->groupBy('mes')
        ->orderBy('mes','asc')
        ->get();
        setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
        $month = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
        if($ano){ 
            foreach($servicos_mes as $servico){
                if ($servico->year == $ano){
                    $year[] = $servico->year;
                    $mes[] = "'".($month[($servico->mes-1)])."'";
                    $tot_mes[] = $servico->total;
                }
            }
            if(isset($mes)){
                $meses = implode(',', $mes);
                $tot_p_mes = implode(',', $tot_mes);
            }
            else{
                $meses = 'nenhum agendamento no ano selecionado';
                $tot_p_mes = 0;
            }
        }
        else{
            $ano = Carbon::now()->format('Y');
            foreach($servicos_mes as $servico){
                $year[] = "'".($servico->year."'");
                $mes[] = "'".($month[($servico->mes-1)])." - ".($servico->year)."'";
                $tot_mes[] = $servico->total;
            }
            if(isset($mes)){
                $meses = implode(',', $mes);
                $tot_p_mes = implode(',', $tot_mes);
            }
            else{
                $meses = 'nenhum';
                $tot_p_mes = 0;
            }
        }
        /*Gráfico */
        if($mes_filter){ /* Se tiver filtragem por ano e por mês*/
            $selected_month = $month[(($mes_filter)-1)];
            $defensoria = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('defensoria', '=', '1')->count();
            $cras = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('cras', '=', '1')->count();
            $codhab = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('codhab', '=', '1')->count();
            $senac = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('senac', '=', '1')->count();
            $sesc_consulta = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_consulta', '=', '1')->count();
            $sesc_sens = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_sens', '=', '1')->count();
            $sesc_mamografia = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_mamografia', '=', '1')->count();
            $sesc_odonto = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_odonto', '=', '1')->count();
            $sesc_insercao_diu = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_insercao_diu', '=', '1')->count();
            $sesc_citopatologico = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_citopatologico', '=', '1')->count();
            $sesc_enfermagem = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sesc_enfermagem', '=', '1')->count();
            $secretaria_da_mulher = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('secretaria_da_mulher', '=', '1')->count();
            $sec_saude = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sec_saude', '=', '1')->count();
            $sejus_subav = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('sejus_subav', '=', '1')->count();
            $delegacia_da_mulher = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('delegacia_da_mulher', '=', '1')->count();
            $fiocruz = Servico::whereYear('updated_at',$ano)->whereMonth('updated_at', $mes_filter)->where('fiocruz', '=', '1')->count();
        }
        else{/*Filtragem apenas por ano*/
            $defensoria = Servico::whereYear('updated_at',$ano)->where('defensoria', '=', '1')->count();
            $cras = Servico::whereYear('updated_at',$ano)->where('cras', '=', '1')->count();
            $codhab = Servico::whereYear('updated_at',$ano)->where('codhab', '=', '1')->count();
            $senac = Servico::whereYear('updated_at',$ano)->where('senac', '=', '1')->count();
            $sesc_consulta = Servico::whereYear('updated_at',$ano)->where('sesc_consulta', '=', '1')->count();
            $sesc_sens = Servico::whereYear('updated_at',$ano)->where('sesc_sens', '=', '1')->count();
            $sesc_mamografia = Servico::whereYear('updated_at',$ano)->where('sesc_mamografia', '=', '1')->count();
            $sesc_odonto = Servico::whereYear('updated_at',$ano)->where('sesc_odonto', '=', '1')->count();
            $sesc_insercao_diu = Servico::whereYear('updated_at',$ano)->where('sesc_insercao_diu', '=', '1')->count();
            $sesc_citopatologico = Servico::whereYear('updated_at',$ano)->where('sesc_citopatologico', '=', '1')->count();
            $sesc_enfermagem = Servico::whereYear('updated_at',$ano)->where('sesc_enfermagem', '=', '1')->count();
            $secretaria_da_mulher = Servico::whereYear('updated_at',$ano)->where('secretaria_da_mulher', '=', '1')->count();
            $sec_saude = Servico::whereYear('updated_at',$ano)->where('sec_saude', '=', '1')->count();
            $sejus_subav = Servico::whereYear('updated_at',$ano)->where('sejus_subav', '=', '1')->count();
            $delegacia_da_mulher = Servico::whereYear('updated_at',$ano)->where('delegacia_da_mulher', '=', '1')->count();
            $fiocruz = Servico::whereYear('updated_at',$ano)->where('fiocruz', '=', '1')->count();
        }

        $total=$defensoria+$cras+$codhab+$senac+$sesc_consulta+$sesc_sens+$sesc_mamografia+$sesc_odonto+$sesc_insercao_diu+$sesc_citopatologico+$sesc_enfermagem+$secretaria_da_mulher+$sec_saude+$sejus_subav+$delegacia_da_mulher+$fiocruz;


    return view('dashboard/estatisticas',['month'=>$month, 'selected_month'=>$selected_month,'ano'=>$ano,'meses'=>$meses,'total'=>$total, 'tot_p_mes'=>$tot_p_mes ,'assistidas'=>$assistidas,
    'servicos'=>$servicos, 'defensoria'=>$defensoria, 'cras'=>$cras, 'defensoria'=>$codhab, 'senac'=>$senac, 'sesc_consulta'=>$sesc_consulta, 'sesc_sens'=>$sesc_sens,
    'sesc_mamografia'=>$sesc_mamografia, 'sesc_odonto'=>$sesc_odonto, 'sesc_insercao_diu'=>$sesc_insercao_diu, 'sesc_citopatologico'=>$sesc_citopatologico, 'sesc_enfermagem'=>$sesc_enfermagem, 
    'secretaria_da_mulher'=>$secretaria_da_mulher, 'sec_saude'=>$sec_saude, 'sejus_subav'=>$sejus_subav, 'delegacia_da_mulher'=>$delegacia_da_mulher, 'fiocruz'=>$fiocruz]);
    }
}