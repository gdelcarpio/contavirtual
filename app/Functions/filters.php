<?php

use Carbon\Carbon;

function is_admin()
{
  return Auth::check() AND Auth::user()->roles->find(2);
}

function is_free()
{
	return Auth::user()->invoices->count() + Auth::user()->credit_notes->count() <= 5;
}

function payment_up_to_date()
{
	if ( has_payments() )
	{
		return Carbon::now()->format('d-m-Y') < Auth::user()->payments->last()->end_date;
	}

	return false;
}

function has_debts()
{
	return ! is_free() AND ! payment_up_to_date() ;
}

function has_payments()
{
	return Auth::user()->payments->count() > 0;
}