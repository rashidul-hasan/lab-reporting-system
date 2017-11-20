@if(isset($results))

    @foreach($results as $field)
        <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
            {!! Form::label( (string) $field->field_id, $field->name . ' (' . $field->unit . ')', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
                {!! Form::text( (string) $field->field_id, $field->quantity, ['class' => 'form-control']) !!}
            </div>
        </div>
    @endforeach
    
@endif

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('remarks', $report['remarks'], ['class' => 'form-control']) !!}
        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="box-footer">
{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
</div>