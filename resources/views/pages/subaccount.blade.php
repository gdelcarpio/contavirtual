{{-- @foreach($subaccount as $sub) --}}
{{-- <option value="{{ $sub->id }}">{{ $sub->name }}</option> --}}
{{-- @endforeach --}}

{!! Form::select('subaccount_venta', $subaccount,['class' => 'form-control text-center', 'required', 'id' => 'subaccount_venta']) !!}