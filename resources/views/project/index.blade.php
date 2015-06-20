@extends('layouts.main', ['selectItem' => 'projects'])

@section('page_title')
Gerenciamento de Projetos -
@stop


@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
        Projetos <small><a href="{!! route('project.create') !!}"><i class="fa fa-plus"></i> projeto</a></small>
    </h1>

    {{-- @include('partials.search') --}}
    {!! Form::search($search) !!}
    @include('partials.alerts')

    @foreach(array_chunk($projects->items(), 3) as $projectChunk)

    <div class="row">
        @foreach($projectChunk as $project)
        <div class="col-md-4">
            <div class="dave-project-card">
                <a href="{!! route('project.details', $project->id) !!}">{!! $project->name !!}</a>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12 text-center">{!! $projects->render() !!}</div>
    </div>
@stop

@section('scripts')
@parent
<script src="{!! elixir('js/projects.js') !!}"></script>
@stop