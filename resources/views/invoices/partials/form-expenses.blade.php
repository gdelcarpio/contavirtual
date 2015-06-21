<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-2 control-label">IGV %</label>
            <div class="col-sm-4">
                {!! Form::text('igv', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '2', 'maxlength' => '4', 'id' => 'igv']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-2 control-label">Sub Total</label>
            <div class="col-sm-4">
                {!! Form::text('subtotal', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '1', 'maxlength' => '10', 'id' => 'subtotal']) !!}
            </div>
        </div>
    </div>
</div>