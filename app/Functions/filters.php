<?php

use Carbon\Carbon;

function is_admin()
{
  return Auth::check() AND Auth::user()->roles->find(2);
}

function is_free()
{
	return ! has_invoices() OR ( has_invoices() AND Auth::user()->invoices->count() <= 10 );
}

function has_invoices()
{
	return has_companies() AND Auth::user()->invoices->count() > 0;
}

function has_companies()
{
	return Auth::user()->companies->count() > 0;
}

function payment_up_to_date()
{
	return Carbon::now() < Auth::user()->payments->last()->end_date;
}

function has_debt()
{
	return ! is_free() AND has_payments() AND ! payment_up_to_date();
}

function has_payments()
{
	return Auth::user()->payments->count() > 0;
}