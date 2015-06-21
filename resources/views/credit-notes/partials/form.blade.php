<h3>{{ $invoice->serial }} - {{ $invoice->number }}</h3>

<div class="row">

    <div class="form-group">


    </div>

</div>

<div class="linea"></div>
<h3>Datos del Comprobante</h3>
<div class="row">

    <div class="col-sm-6">

        <div class="form-group has-feedback">

            <label class="col-sm-2 control-label">Emisión</label>
            <div class="col-sm-4">
                {!! Form::text('date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd-mm-yyyy', 'required', 'id' => 'date']) !!}
                <span class="fa fa-calendar form-control-feedback"></span>
            </div>

            <label class="col-sm-2 control-label">Vencimiento</label>
            <div class="col-sm-4">
                {!! Form::text('expiration_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd-mm-yyyy', 'required', 'id' => 'expiration_date']) !!}
                <span class="fa fa-calendar form-control-feedback"></span>
            </div>

        </div>

    </div>

</div>

<div class="row">
    <div class="form-group">
        <div class="col-sm-2 text-right">
            <label class="control-label">Descripción</label>
        </div>

        <div class="col-sm-10">
            {!! Form::textarea('description', null, ['class' => 'form-control text-center', 'rows' => '2', 'placeholder' => 'Deja una anotación o descripción...', 'required', 'id' => 'description']) !!}
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

    @include('scripts.hide-div')

@endsection