<?php


namespace App\Http\Controllers;


use App\Currency;

class CurrencyRepositary
{
    public function getAllCurrencies()
    {
        return Currency::where('status', 'active')->get();
    }
}
