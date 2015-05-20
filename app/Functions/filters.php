<?php

function is_admin()
{
  return Auth::check() && Auth::user()->roles->find(2);
}