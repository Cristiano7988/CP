@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Pessoa
                </div>
                <div class="card-body">
                    <p><b>Nome:</b> {{ $pessoa->nome }}</p>
                    <p><b>Email:</b> {{ $pessoa->email }}</p>
                    <p><b>Telefone:</b> {{ $pessoa->telefone }}</p>
                    <a href="{{ route('pessoas.edit', $pessoa) }}" class="btn btn-primary">Editar</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
