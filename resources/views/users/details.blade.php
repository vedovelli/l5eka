@extends('layouts.main', ['selectItem' => 'user'])

@section('page_title')
Detalhes de Usuário -
@stop

@section('content')
    <h1 class="page-header">
        <i class="fa fa-fw fa-user"></i>
        {!! $user->name !!}
    </h1>

    <h4>Projetos que {!! $user->name !!} é <strong>líder</strong>:</h4>
    <ul>
        @foreach($user->owns as $project)
        <li><a href="{!! route('project.details', $project->id) !!}">{!! $project->name !!}</a></li>
        @endforeach
    </ul>
    <h4>Projetos que {!! $user->name !!} é <strong>membro</strong>:</h4>
    <ul>
        @foreach($user->isMemberOf as $project)
        <li><a href="{!! route('project.details', $project->id) !!}">{!! $project->name !!}</a></li>
        @endforeach
    </ul>

    <hr>

    <a href="{!! route('project.details', $projectId) !!}" class="btn btn-xs btn-default">
        <i class="fa fa-arrow-left"></i> voltar
    </a>
@stop