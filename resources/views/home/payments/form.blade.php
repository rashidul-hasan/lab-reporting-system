{{ Form::hidden('invoice_id', $invoice_id) }}

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('payment_method', 'Payment method', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::select('payment_method', ['' => 'Select Payment Mehod', 'bkash' => 'bKash'], '', ['class' => 'form-control payment-method-dropdown']) !!}
        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group payment-bkash" style="display: none;">
    {!! Form::label('', '', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
    	<p>Send the money to our bKash account (01717247384) and enter the Transaction ID here</p>
        {!! Form::text('bkash_trxd', null, ['class' => 'form-control', 'placeholder' => 'bKash Transaction ID']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Make Payment', ['class' => 'btn btn-primary']) !!}
    </div>
</div>