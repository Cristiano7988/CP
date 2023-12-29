@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Atualizar Pessoa
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('pessoas.update', $pessoa) }}">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <label for="nome" class="col-md-2 col-form-label text-md-end">Nome</label>

                        <div class="col-md-8">
                            <input id="nome" type="text" value="{{ old('nome') ?? $pessoa->nome }}" class="form-control @error('nome') is-invalid @enderror" name="nome" required autocomplete="nome">

                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-2 col-form-label text-md-end">Email</label>

                        <div class="col-md-8">
                            <input id="email" type="mail" value="{{ old('email') ?? $pessoa->email }}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="telefone" class="col-md-2 col-form-label text-md-end">Telefone</label>

                        <div class="col-md-8">
                            <input id="telefone" type="tel" value="{{ old('telefone') ?? $pessoa->telefone }}" class="form-control @error('telefone') is-invalid @enderror" name="telefone" required autocomplete="telefone">

                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="submit" class="btn btn-primary" value="Salvar" />
                        </div>
                    </div>
                </form>
                <form method="POST" class="d-flex justify-content-end" action="{{ route('pessoas.destroy', $pessoa) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit"  class="btn btn-danger" value="Deletar" />
                </form>
            </div>
        </div>
    </div>
@endsection
