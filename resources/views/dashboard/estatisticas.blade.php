@extends('layouts.main')

@section('tile', 'Estatisticas')

@section('content')

<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <a style="text-decoration:none" href="{{route('dashboard')}}">
            <div class="card mx-auto my-5" style="width: 20rem;">
                <article class="bg-gradient-green rounded">
                    <p class="mx-auto">Assistidas Cadastradas</p>
                    <h3>{{$assistidas}}</h3>       
                </article>
            </div>
            </a>
        </div>
        <div class="col">
            <a style="text-decoration:none" href="{{route('dashboard')}}">
            <div class="card mx-auto my-5" style="width: 20rem;">
            <article class="bg-gradient-blue rounded">
            <p class="mx-auto">Serviços Prestados</p>
            <h3> {{$total}} </h3>           
            </article>
            </div>
            </a>
        </div>
        <div class="col">
            <a style="text-decoration:none" href="{{route('dashboard')}}">
        <div class="card mx-auto my-5" style="width: 20rem;">
            <article class="bg-gradient-orange rounded">
            <p class="mx-auto">Historico de atendimentos</p>
            <h3> {{$servicos}} </h3>           
            </article>
        </div>
        </div>
        </a>
    </div>
</div><br>
<div class="row mx-1 mb-5">
    <section class="graficos col 12 my-5" >            
      <div class="grafico card z-depth-4">
        <span class="d-inline-flex p-2">
            <form action="{{route('dashboard')}}">
                @csrf
                <label for="começo"><input type="number" min="2023" max="2099" step="1" value="{{$ano}}" class="form-control" id="ano" name="ano"></label>
                <input type="submit" class="btn btn-warning btn-sm" value="filtrar" >
            </form>
        </span>
          <h5 class="center"> Atendimentos</h5>
          @if($meses == 'nenhum agendamento no Ano selecionado')
          <p style="font-weight:bold">Nenhum histórico no Ano de {{$ano}}</p>
          @endif
          <canvas id="myChart" width="700" height="350"></canvas>
      </div>           
    </section> 
    <section class="graficos col 12 my-5">            
        <div class="grafico card z-depth-4">
            <span class="d-inline-flex p-2">
                <form action="{{route('dashboard')}}">
                    <input type="hidden" name="ano" value="{{$ano}}">
                    @csrf
                    <label for="mes_filter">
                        <select class=" form-select form-select-sm my-2 mx-2 " aria-label="Default select example" name="mes_filter" id="mes_filter">
                            <option value="01" >{{$selected_month}}</option>
                            <option value="01" >Janeiro</option>
                            <option value="02" >Fevereiro</option>
                            <option value="03" >Março</option>
                            <option value="04" >Abril</option>
                            <option value="05" >Maio</option>
                            <option value="06" >Junho</option>
                            <option value="07" >Julho</option>
                            <option value="08" >Agosto</option>
                            <option value="09" >Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </label>
                    <input type="submit" class="btn btn-warning btn-sm mx-3" value="filtrar" >
                </form>
            </span>
            <h5 class="center"> Serviços @if($selected_month != 'todos os meses') <span style="font-weight:bold" >{{$selected_month}}</span> @endif</h5>
            @if($selected_month==0 && $defensoria == 0 && $cras == 0 && $codhab == 0 && $senac == 0 && $sesc_consulta == 0 && $sesc_sens == 0 && $sesc_mamografia == 0 && $sesc_odonto == 0 && $sesc_insercao_diu == 0 && $sesc_citopatologico == 0 && $sesc_enfermagem == 0 && $secretaria_da_mulher == 0 && $sec_saude == 0 && $sejus_subav == 0 && $delegacia_da_mulher == 0 && $fiocruz == 0)
                <p style="font-weight:bold">Nenhum histórico para {{$selected_month}} de {{$ano}}</p>
            @endif
            <canvas id="myChart2" width="700" height="350"></canvas> 
        </div>
    </section>           
</div>  

@endsection
@push('graficos')
<script>
/* Gráfico 01 */
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [{$meses}],
        datasets: [{
            label: ['Atendimentos'],
            data: ["tot_p_mes"],
            backgroundColor: [
                'rgba(153, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',                         
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)'/*,
                'rgba(54, 162, 235, 1)',
                'rgba(173, 133, 145, 1)',
                'rgba(129, 173, 181, 1)',
                'rgba(201, 194, 127, 1)',
                'rgba(185, 156, 107, 1)',
                'rgba(129, 173, 181, 1)',                         
                'rgba(228, 153, 105, 1)',
                'rgba(200, 200, 200, 1)'*/
            ],
            borderColor: [
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)'/*,
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)'*/
            ],
           borderWidth: 1, 
           maxBarThickness: 50,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

/* Gráfico 02 */
var ctx = document.getElementById('myChart2');
var myChart2 = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            'selected_month',
            'defensoria',
            'cras',
            'codhab'/*,
            'senac',
            'sesc_consulta',
            'sesc_sens',
            'sesc_mamografia',
            'sesc_odonto',
            'sesc_insercao_diu',
            'sesc_citopatologico',
            'sesc_enfermagem',
            'secretaria_da_mulher',
            'sec_saude',
            'sejus_subav',
            'delegacia_da_mulher',
            'fiocruz'*/
        ],
        datasets: [{
            label: 'Pareceres',
            data: [
                'selected_month',
                'defensoria',
                'cras',
                'codhab'
                /*'senac',
                'sesc_consulta',
                'sesc_sens',
                'sesc_mamografia',
                'sesc_odonto',
                'sesc_insercao_diu',
                'sesc_citopatologico',
                'sesc_enfermagem',
                'secretaria_da_mulher',
                'sec_saude',
                'sejus_subav',
                'delegacia_da_mulher',
        'fiocruz',*/
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'/*
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(120, 120, 120, 1)',
            'rgba(0, 128, 0, 1)',
            'rgba(255, 0, 0, 0.7)',
            'rgba(0, 0, 255, 0.7)',
            'rgba(255, 165, 0, 0.7)',
            'rgba(128, 0, 128, 0.7)',
            'rgba(0, 255, 0, 0.7)',
            'rgba(255, 0, 255, 0.7)',
            'rgba(0, 255, 255, 0.7)',
            'rgba(128, 128, 0, 0.7)',
            'rgba(0, 0, 0, 0.5)',*/
            ]
        }]
    }
});
</script>
@endpush
