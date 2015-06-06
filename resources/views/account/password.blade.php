@extends('layouts.main', ['selectItem' => ''])

@section('page_title')
Trocar Senha - 
@stop

@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-lock"></i>
        Trocar Senha
    </h1>

    @include('partials.alerts')

    {{-- 
    @section('scripts')
    @parent
    <script src="{!! elixir('js/categories.js') !!}"></script>
    @stop
 --}}
@stop