<div class="col-sm-4 col-sm-offset-8 total">

    <div class="row" style="padding-bottom:10px">
        <div class="col-xs-6">Subtotal</div>
        <div class="col-xs-6 text-right">PEN {{ Cart::getTotal() == '' ? '0.00' : Cart::getTotal() }}</div>
        <div class="clearfix visible-xs-block"></div>
    </div>

    <div class="row" style="padding-bottom:10px">
        <div class="col-xs-6">IGV</div>
        <div class="col-xs-6 text-right">{{ session('igv') == '' ? '0.00' : session('igv') }} %</div>
        <div class="clearfix visible-xs-block"></div>
    </div>

    <div class="row detalle_cabecera" style="padding:10px 0px" >
        <div class="col-xs-6">Total</div>
        <div class="col-xs-6 text-right">PEN {{ ( ( Cart::getTotal() == '' ) OR ( session('igv') == '' ) ) ? '0.00' : Cart::getTotal() * ( 1 + ( session('igv') / 100 ) )}}</div>
        <div class="clearfix visible-xs-block"></div>
    </div>

</div>