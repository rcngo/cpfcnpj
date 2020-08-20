<?php

namespace rcngo\cpfcnpj\Provider;

use Illuminate\Support\ServiceProvider;

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
            return $this->app->make(rcngo\cpfcnpj\CpfCnpj::class);
        });
    }

    /**
     *
     */
    public function boot()
    {

    }
}
