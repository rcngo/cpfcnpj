<?php

namespace rcngo\cpfcnpj\Provider;

use Illuminate\Support\ServiceProvider;
use rcngo\cpfcnpj\CpfCnpj;

/**
 * Class CpfCnpjServiceProvider
 * @package rcngo\CpfCnpj\Provider
 */
class CpfCnpjServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;

    /**
     *
     */
    public function register()
    {
        $this->app->singleton('cpfcnpj', function () {
            return $this->app->make(CpfCnpj::class);
        });
    }

}
