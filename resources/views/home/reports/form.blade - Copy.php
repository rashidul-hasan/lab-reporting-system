              <div class="box-body">

                <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                    {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                        {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary pull-right']) !!}
              </div>


<!-- <div class="form-group {{ $errors->has('sample_id') ? 'has-error' : ''}}">
    {!! Form::label('sample_id', 'Sample Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('sample_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sample_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->

<!--           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->

<!--               <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- /.box-body -->
<!--               <div class="box-footer">
                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
              </div> -->
              <!-- /.box-footer -->
<!--           </div>

<i class="fa fa-text-width"></i>
<h3 class="box-title">Results</h3>

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('remarks', 'Remarks', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
        {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div> -->