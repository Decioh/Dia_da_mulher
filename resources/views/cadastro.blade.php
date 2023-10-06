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
              <label class="mx-3"> Defensoria Pública <input type="checkbox" name="defensoria_publica"></label>
              <label class="mx-3"> CRAS <input  type="checkbox" name="cras"></label>
              <label class="mx-3"> CODHAB <input  type="checkbox" name="codhab"></label>
              <label class="mx-3"> SENAC <input  type="checkbox" name="senac"></label>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SESC Consulta       <input type="checkbox" name="sesc_consulta"></label>
                <label class="mx-3"> SESC Sensibilização <input type="checkbox" name="sesc_sens"></label>
                <label class="mx-3"> SESC Mamografia     <input type="checkbox" name="sesc_mamografia"></label>
                <label class="mx-3"> SESC Odonto         <input type="checkbox" name="sesc_odonto"></label>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SESC Inserção DIU   <input type="checkbox" name="sesc_insercao_diu"></label>
                <label class="mx-3"> SESC Citopatológico <input type="checkbox" name="sesc_citopatologico"></label>
                <label class="mx-3"> SESC Enfermagem     <input type="checkbox" name="sesc_enfermagem"></label>
            </div><br>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SEDET               <input type="checkbox" name="sedet"></label>
                <label class="mx-3"> Secretaria da mulher<input type="checkbox" name="secretaria_da_mulher"></label>
                <label class="mx-3"> Secretaria de Saúde <input type="checkbox" name="sec_saude"></label>
            </div><br>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> Sejus Subav         <input type="checkbox" name="sejus_subav"></label>
                <label class="mx-3"> Delegacia da mulher <input type="checkbox" name="delegacia_da_mulher"></label>
                <label class="mx-3"> Fiocruz             <input type="checkbox" name="Fiocruz"></label>
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