@extends('layouts.main')

@section('title', 'Agendar')

@section('content')  

<form action="{{ route('assistida.store')}}" method="POST">
    @csrf
    
    <div class="cadastro mt-3">
        <p class="fw-bold fs-5">Dados pessoais: </p>
        <div class="cadastron mt-3">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="cadastrotel mt-3"> 
            <label for="tel">Telefone:</label>
            <input type="text" id="tel" name="tel" maxlength="11" required>
        </div> 
        <div class="cidade mt-3"> 
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="mt-3">
            <label for="cidade">Cidade:</label>
            <select name="cidade" id="cidade">
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->RA }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label>Lanches <input type="text" name="lanche"></label>
        </div>
        <div class="mt-3">
            <label> Acompanhada <input type="checkbox" name="acompanhada"></label>
        </div>
        <div class="container p-5">
            <div class="mb-3 form-check form-check-inline">
              <label> Defensoria Pública <input class="ml-3" type="checkbox" name="defensoria_publica"></label>
              <label> CRAS <input type="checkbox" name="cras"></label>
              <label> CODHAB <input type="checkbox" name="codhab"></label>
              <label> SENAC <input type="checkbox" name="senac"></label>
            </div>
        </div>
        <div class="mb-3 form-check form-check-inline">
            <label>Demanda não Atendida <input type="checkbox" name="demanda_n_atendida"> </label>
            <label>QUAL? <input type="text" name="qual"></label>
        </div>
        <br>
        <div class="form-group">
            <p>
                <input type="submit" class="btn btn-success" value="Cadastrar" >
                <input type="reset" class="btn btn-secondary" value="Limpar" >
            </p>
        </div>
    </div>
</form>

@endsection