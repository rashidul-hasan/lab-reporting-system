<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    {!! Form::label('code', 'Code', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('code', null, ['class' => 'form-control']) !!}
        {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    {!! Form::label('cost', 'Cost', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::number('cost', null, ['class' => 'form-control']) !!}
        {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slot') ? 'has-error' : ''}}">
    {!! Form::label('', 'Current Slots', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        @if(isset($test_slots))
            @foreach($test_slots as $test_slot)
                <small class="label bg-blue">{{ $test_slot['time'] }}</small>
            @endforeach
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('slot') ? 'has-error' : ''}}">
    {!! Form::label('slot', 'Edit Slot', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('slot[]', $slots, null, ['class' => 'form-control chosen-select', 'data-placeholder' 
        => 'Select new slots or leave it blank to keep it unchanged', 'multiple' => true, 'tabindex' => '4']) !!}
        {!! $errors->first('slot', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>