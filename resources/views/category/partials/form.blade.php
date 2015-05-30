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