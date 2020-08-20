<?php

namespace rcngo\cpfcnpj\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class CpfCnpj
 * @package rcngo\CpfCnpj\Facade
 */
class CpfCnpj extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cpfcnpj';
    }
}
