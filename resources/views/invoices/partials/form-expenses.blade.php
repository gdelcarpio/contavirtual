<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-2 control-label">Total</label>
            <div class="col-sm-4">
                {!! Form::text('total', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '1', 'maxlength' => '10', 'id' => 'total']) !!}
            </div>
        </div>
    </div>
</div>