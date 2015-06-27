<div class="row">

    <div class="form-group">


    </div>

</div>

<div class="linea"></div>
<h3>Datos de la Nota de Crédito</h3>

<div class="row">
    <div class="form-group">
        <div class="col-md-4">
            <label class="col-sm-4 control-label">Sub Total</label>
            <div class="col-sm-8">
                {!! Form::text('subtotal', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '1', 'maxlength' => '10', 'id' => 'subtotal']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <label class="col-sm-4 control-label">IGV</label>
            <div class="col-sm-8">
                {!! Form::text('igv', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '2', 'maxlength' => '4', 'id' => 'igv']) !!}
            </div>
        </div>

        <div class="col-md-4">
            <label class="col-sm-4 control-label">Total</label>
            <div class="col-sm-8">
                {!! Form::text('total', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números', 'required', 'minlength' => '1', 'maxlength' => '10', 'id' => 'total']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="form-group has-feedback">
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">Empresas</label>
            <div class="col-sm-8">
                {!! Form::select('companies', $companies, null, ['class' => '', 'required', 'id' => 'company_id']) !!}
            </div>
        </div>
        <div class="col-sm-4">
            <label class="col-sm-4 control-label">Comprobantes</label>
            <div class="col-sm-8" id="invoice">
                {{-- <select name="" id="invoice_id"></select> --}}
            </div>
        </div>
        <div class="col-sm-4">

            <label class="col-sm-4 control-label">Emisión</label>
            <div class="col-sm-8">
                {!! Form::text('date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd-mm-yyyy', 'required', 'id' => 'date']) !!}
                <span class="fa fa-calendar form-control-feedback"></span>
            </div>

        </div>

    </div>

</div>

<div class="row">
    <div class="form-group">
        <div class="col-sm-12">
            
            <label class="col-sm-1 control-label">Descripción</label>
            <div class="col-sm-11">
                {!! Form::textarea('description', null, ['class' => 'form-control text-center', 'rows' => '2', 'placeholder' => 'Deja una anotación o descripción...', 'required', 'id' => 'description']) !!}
            </div>

        </div>
    </div>
</div>

<div class="linea col-md-12"></div>

<div class="row">
    <div class="col-sm-12 text-center">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar como borrador</button>
            <button type="submit" class="btn btn-danger">{{ $submitButton }}</button>
        </div>
    </div>
</div>

@section('scripts')
    
    @include('scripts.ajax-invoices')

@endsection