<?php

namespace Rzakhanov\DomainInformer;


use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views/', 'domainInformer');
    }
}
