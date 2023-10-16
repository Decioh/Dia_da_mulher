@extends('layouts.main')

@section('title', 'Agendar')

@section('content') 

<div id="search-container" class="col-md-12 justify-content-center">
    <h2>Buscar assistido</h2>
    <form action="#" method="GET">
        <input type="text" id="search" name="search" placeholder="Procure pelo Nome ou CPF"> <br>
        <button type="submit" class="btn btn-warning btn-sm mt-1">Pesquisar</button>
    </form>
</div>

<div class="listAssistidos">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Cidade</th>
            <th scope="col">Último atendimento</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
@foreach ($assistidas as $assistida)
        @php
        /*$cpf = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $assistida -> cpf);*/
        $tel = preg_replace("/(\d{0})(\d{2})(\d{5})(\d{4})/", "\$1(\$2)\$3-\$4", $assistida -> tel);
        @endphp
        <tbody>
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$assistida->nome}}</td>
                <td>{{$tel}}</td>
                <td>{{$assistida->email}}</td>
                <td>{{$cidades[$assistida->cidades_id-1]->RA}}</td>
                <td>@if($assistida->created_at != null){{date('d/m/Y', strtotime($assistida -> updated_at))}} @else - @endif</td>
                <td>
                    <a href="#{{--route('assistida.info', $assistida-> id)--}}"class="btn btn-secondary btn-sm"> info </a>
                    <a href="#{{-- route('agenda.list', $assistida-> id)--}}"class="btn btn-success btn-sm"> Agendar </a>
                </td>
            </tr>
        </tbody>
    
@endforeach
@if(isset($search))
    @if((count($assistidas)==0))
        <p>Não foi encontrada uma assistida com o dado pesquisado: {{$search}}</p> 
    @endif
@endif
    <a href="#{{--route('assistida.novo')--}}"class="btn btn-success btn-sm"> Cadastrar </a>  
    </div>
    
    <div class="mt-3 mx-auto" style="width: 150px">
    {{$assistidas->links()}}
    </div>

@endsection