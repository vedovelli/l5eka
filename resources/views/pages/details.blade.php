@extends('layouts.main', ['selectItem' => 'projects'])

@section('page_title')
Visualização de Página -
@stop

@section('content')
    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
         {!! $page->title !!}
    </h1>

    <div class="well">
        {!! $page->content !!}
    </div>



    <a class="btn btn-xs btn-default" href="{!! route('project.details', $projectId) !!}">
        <i class="fa fa-arrow-left"></i>
        voltar
    </a>
@stop