<div class="form-group {{ $errors->has('sample_type') ? 'has-error' : ''}}">
    {!! Form::label('sample_type', 'Sample Type', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('sample_type', $sample_types, null, ['class' => 'form-control']) !!}
        {!! $errors->first('sample_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('collect_date') ? 'has-error' : ''}}">
    {!! Form::label('collect_date', 'Collect Date', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('collect_date', null, ['class' => 'form-control my-datepicker']) !!}
        {!! $errors->first('collect_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>