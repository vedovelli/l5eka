@extends('layouts.main')

@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
        Projetos
    </h1>

    @include('partials.search')
    @include('partials.alerts')

    @foreach(array_chunk($projects->items(), 3) as $projectChunk)
    
    <div class="row">
        @foreach($projectChunk as $project)
        <div class="col-md-4">
            <div class="dave-project-card">
                {!! $project->name !!}
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

    @include('partials.alerts')
@stop