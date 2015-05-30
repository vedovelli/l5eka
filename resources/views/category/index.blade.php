@extends('layouts.main')

@section('content')
<h1 class="page-header">
    <i class="fa fa-fw fa-list"></i>
    Categorias
</h1>

    <div class="row">
        <div class="col-md-6">

            {{-- Lista --}}
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

            {{-- Paginacao --}}
            <p>Página {!! $categories->currentPage() !!} de {!! $categories->lastPage() !!}</p>

            <div class="row">
                <div class="col-md-12 text-center">
                    {!! $categories->render() !!}
                </div>
            </div>
            {{-- Paginacao End --}}

        </div>
        <div class="col-md-6">
            <div class="well">
                {!! Form::open() !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nome da Categoria', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-fw fa-save"></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop