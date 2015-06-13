@extends('layouts.main', ['selectItem' => 'projects'])

@section('page_title')
Criar novo projeto -
@stop


@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
        Projetos <small>Criar novo projeto</small>
    </h1>

    @include('partials.alerts')

    @if(is_null($project))
    {!! Form::open(['route' => 'project.store']) !!}
    @else
    {!! Form::model($project, ['route' => ['project.update', $project->id] ]) !!}
    @endif

    <div class="form-group">
        {!! Form::label('owner', 'Líder do Projeto', ['class' => 'control-label']) !!}
        {!! Form::select('owner', ['' => ''] + $usersForSelect, $owner, ['class' => 'form-control', 'id' => 'owner', 'placeholder' => 'Selecionar um líder para o projeto']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Nome do projeto', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categories', 'Categorias', ['class' => 'control-label']) !!}
        {!! Form::select('categories[]', $categoriesForSelect, $categories, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'categories', 'placeholder' => 'Selecionar uma ou mais categorias']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('users', 'Membros', ['class' => 'control-label']) !!}
        {!! Form::select('users[]', $usersForSelect, $members, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'users', 'placeholder' => 'Selecionar um ou mais membros']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Descrição', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{!! route('project.index') !!}" class="btn btn-default">
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

@section('scripts')
@parent
<script src="{!! elixir('js/projects.js') !!}"></script>
@stop