@extends('layouts.main', ['selectItem' => 'pages'])

@section('page_title')
Criar nova página -
@stop


@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
        Criar nova página
    </h1>

    {!! Form::open(['route' => ['page.store', $project_id, $section_id]]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Título', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Conteúdo', ['class' => 'control-label']) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{!! route('project.details', $project_id) !!}" class="btn btn-default">
                <i class="fa fa-arrow-left"></i> voltar
            </a>
        </div>
        <div class="col-md-6 text-right">
            <button class="btn btn-success" type="submit">
                <i class="fa fa-save"></i> Salvar
            </button>
        </div>
    </div>

    {!! Form::close() !!}

@stop
