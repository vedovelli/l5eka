@extends('layouts.main')

@section('content')
<h1 class="page-header">
    <i class="fa fa-fw fa-list"></i>
    Categorias
</h1>

    <div class="well">
        {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('name', 'Nome da Categoria', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <table class="table table-bordered table-striped table-hover" id="gridCategorias">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Criada em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{!! $cat['id'] !!}</td>
                <td>{!! $cat['name'] !!}</td>
                <td>{!! $cat['created_at'] !!}</td>
                <td>
                    <button class="btn btn-xs btn-primary">editar</button>
                    <button class="btn btn-xs btn-danger">excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Página {!! $categories->currentPage() !!} de {!! $categories->lastPage() !!}</p>

    <div class="row">
        <div class="col-md-12 text-center">
            {!! $categories->render() !!}
        </div>
    </div>

@stop