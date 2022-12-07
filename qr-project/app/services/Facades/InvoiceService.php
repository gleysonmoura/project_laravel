<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facede;

class InvoiceService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\InvoiceService\InvoiceService::class;
    }
}