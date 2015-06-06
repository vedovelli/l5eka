@extends('layouts.main', ['selectItem' => ''])

@section('page_title')
Sua conta -
@stop

@section('content')

    <h1 class="page-header">
        <i class="fa fa-fw fa-user"></i>
        Sua Conta
    </h1>

    @include('partials.alerts')

    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td><strong>Nome</strong></td>
                <td>{!! $user->name !!}</td>
            </tr>
            <tr>
                <td><strong>E-mail</strong></td>
                <td>{!! $user->email !!}</td>
            </tr>
            <tr>
                <td width="150"><strong>Data Criação</strong></td>
                <td>{!! $user->created_at !!}</td>
            </tr>
            <tr>
                <td><strong>Projetos</strong></td>
                <td>
                    <ul>
                        @foreach($projects as $project)
                        <li><a href="#">{!! $project->name !!}</a></li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    {{--
    @section('scripts')
    @parent
    <script src="{!! elixir('js/categories.js') !!}"></script>
    @stop
 --}}
@stop