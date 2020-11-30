@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Financeiro Despesas </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('despesas.create') }}" title="Criar">+ Nova Despesa<i class="fas fa-plus-circle"></i>
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
            <th>Despesa</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Tipo</th>
            <th>Emissão</th>
            <th>Criado em</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($despesas as $despesa)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $despesa->des }}</td>
                <td>{{ $despesa->valr }}</td>
                <td>{{ $despesa->vencc }}</td>
                <td>{{ $despesa->stt }}</td>
                <td>{{ $despesa->emiss }}</td>
                <td>{{ date_format($despesa->created_at, 'j M Y') }}</td>
                <td>
                    <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST">

                        <a href="{{ route('despesas.show', $despesa->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg">Mostrar</i>
                        </a>

                        <a href="{{ route('despesas.edit', $despesa->id) }}">
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

    {!! $despesas->links() !!}

@endsection
