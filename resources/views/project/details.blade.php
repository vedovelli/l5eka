@extends('layouts.main', ['selectItem' => 'projects'])

@section('page_title')
Detalhes do Projeto {!! $project->name !!}
@stop

@section('content')
{{-- 
Quantidade de projetos: {!! $quantity !!}

{!! $markup !!}
 --}}
{!! Form::open(['route' => ['section.store', $project->id]]) !!}
    <div class="modal fade" id="modalSection">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Criar nova seção de conteúdo</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                {!! Form::label('name', 'Nome da Seção', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
{!! Form::close() !!}

    <h1 class="page-header">
        <i class="fa fa-fw fa-files-o"></i>
        {!! $project->name !!} <small>Detalhes do Projeto</small>
    </h1>

    <div class="row">
        <div class="col-md-6">
            <a href="{!! route('project.edit', $project->id) !!}">
                <i class="fa fa-fw fa-pencil"></i>
                editar
            </a>
        </div>
        <div class="col-md-6 text-right">
           <small>Atualizado {!! \Carbon\Carbon::parse($project->updated_at)->diffForHumans() !!}</small>
        </div>
    </div>
    <p>&nbsp;</p>
    @include('partials.alerts')

    <div class="row">
        <div class="col-md-12">
            <blockquote>{!! $project->description !!}</blockquote>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <strong>Categorias: </strong>
                <ul style="display:inline;">
                    @foreach($project->categories as $category)
                    <li  style="display:inline;">
                        <a href="{!! route('category.edit', $category->id) !!}">{!! $category->name !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <a href="#" data-toggle="modal" data-target="#modalSection">
                <h4>
                    <i class="fa fa-plus"></i>
                    seção
                </h4>
            </a>

            @foreach($project->sections as $section)
                <h4 style="margin: 20px 0 20px 0">

                    @if(count($section->pages) == 0)
                    <small>
                        <a href="{!! route('section.destroy', $section->id) !!}" class="text-danger">
                            <i class="fa fa-remove"></i>
                        </a>
                    </small>
                    @endif

                    <i class="fa fa-folder-open"></i>
                    {!! $section->name !!}
                    <small><a href="{!! route('page.create', [$project->id, $section->id]) !!}">
                        <i class="fa fa-plus"></i>
                        pagina
                    </a></small>
                </h4>

                <ul style="list-style: none;">
                    @foreach($section->pages as $page)
                    <li>

                        <small>
                            <a href="" class="text-danger">
                                <i class="fa fa-remove"></i>
                            </a>
                        </small>

                        <a href="{!! route('page.details', [$page->id, $project->id]) !!}">{!! $page->title !!}</a>
                    </li>

                    @endforeach
                </ul>

            @endforeach

        </div>
        <div class="col-md-4">
            <div class="well">
                <p><strong>Líder</strong></p>
                <ul>
                    <li><a href="{!! route('user.details', [$project->owner->id, $project->id]) !!}">{!! $project->owner->name !!}</a></li>
                </ul>
                <p><strong>Membros</strong></p>
                <ul>
                    @foreach($project->members as $member)
                    <li><a href="{!! route('user.details', [$member->id, $project->id]) !!}">{!! $member->name !!}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop

@section('scripts')
@parent
<script src="{!! elixir('js/projects.js') !!}"></script>
@stop