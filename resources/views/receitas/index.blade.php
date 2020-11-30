@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Financeiro Receitas </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('receitas.create') }}" title="Criar">+Nova Despesa<i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>ID</th>
            <th>Receita</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Tipo</th>
            <th>Emissão</th>
            <th>Criado em</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($receitas as $receita)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $receita->des }}</td>
                <td>{{ $receita->valr }}</td>
                <td>{{ $receita->vencc }}</td>
                <td>{{ $receita->stt }}</td>
                <td>{{ $receita->emiss }}</td>
                <td>{{ date_format($receita->created_at, 'j M Y') }}</td>
                <td>
                    <form action="{{ route('receitas.destroy', $receita->id) }}" method="POST">

                        <a href="{{ route('receitas.show', $receita->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Criar</i>
                        </a>

                        <a href="{{ route('receitas.edit', $receita->id) }}">
                            <i class="fas fa-edit  fa-lg">Editar</i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger">Deletar</i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $receitas->links() !!}

@endsection
