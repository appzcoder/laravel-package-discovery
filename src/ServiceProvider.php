<?php

namespace Appzcoder\LaravelPackageDiscovery;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class ServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (\App::VERSION() >= '5.5') {
            return;
        }

        $packages = [];

        $packagesFile = base_path() . 'bootstrap/cache/packages.php';

        if (file_exists($packagesFile)) {
            $packages = include . $packagesFile;
        }

        foreach ($packages as $package) {
            if (!empty($package['providers'])) {
                array_walk($package['providers'], function ($provider) {
                    $this->app->register($provider);
                });
            }

            if (!empty($package['aliases'])) {
                array_walk($package['aliases'], function (&$aliasValue, $aliasKey) {
                    AliasLoader::getInstance()->alias($aliasKey, $aliasValue);
                });
            }
        }
    }
}
