<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('unit') ? 'has-error' : ''}}">
    {!! Form::label('unit', 'Unit', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('unit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('unit', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('normal') ? 'has-error' : ''}}">
    {!! Form::label('normal', 'Normal', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('normal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('normal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('normal') ? 'has-error' : ''}}">
    {!! Form::label('abnormal', 'Abnormal', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('abnormal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('abnormal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('normal') ? 'has-error' : ''}}">
    {!! Form::label('ref_range', 'Reference Range', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('ref_range', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ref_range', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('test_id') ? 'has-error' : ''}}">
    {!! Form::label('test_id', 'Test Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('test_id', $tests, null, ['class' => 'form-control']) !!}
        {!! $errors->first('test_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-2 col-md-2">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>