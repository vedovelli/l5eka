{!! Form::open(['class' => 'well', 'method' => 'GET']) !!}
    {!! Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Digite o termo e pressione enter']) !!}
{!! Form::close() !!}