@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Lista de Pessoas
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @if (!count($pessoas))
                    <tr>
                        <td colspan="6" class="text-center">
                            <p>Não encontramos pessoas em nossos registros.</p>
                        </td>
                    </tr>
                @endif
                @foreach ($pessoas as $pessoa)
                    <tr style="cursor: pointer;" onclick="location.pathname = 'pessoas/{{ $pessoa->id }}'">
                        <th scope="row">{{ $pessoa->id }}</th>
                        <td>{{ $pessoa->nome }}</td>
                        <td>{{ $pessoa->telefone }}</td>
                        <td>{{ $pessoa->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $pessoas->links() }}
        </div>
    </div>
</div>
@endsection
