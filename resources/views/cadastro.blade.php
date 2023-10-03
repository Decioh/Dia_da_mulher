@extends('layouts.main')

@section('title', 'Agendar')

@section('content')  

<form action="{{ route('assistida.store')}}" method="POST">
    @csrf
<div class="cadastro"><br>
    <div class="cadastron">
        <label for="nome"><b>Nome:</b></label>
        <input type="text" id="nome" name="nome" required>
    </div><br>
    <div class="cadastrotel"> 
        <label for="telefone"><b>Telefone:</b></label>
        <input type="text" id="telefone" name="telefone" maxlength="11" required>
    </div> <br>
    <div class="cidade"> 
        <label for="email"><b>E-mail:</b></label>
        <input type="text" id="email" name="email" required>
    </div> <br>
    <label for="cidade">Cidade:</label>
    <select name="cidade" id="cidade">
        @foreach ($cidades as $cidade)
            <option value="{{ $cidade->id }}">{{ $cidade->RA }}</option>
        @endforeach
    </select>
        <div class="form-group">
        <p>
            <input type="submit" class="btn btn-success" value="Cadastrar" >
            <input type="reset" class="btn btn-secondary" value="Limpar" >
        </p>
    </div>
</div>
</form>


@endsection