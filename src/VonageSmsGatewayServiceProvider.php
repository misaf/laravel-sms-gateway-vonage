<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayVonage;

use Illuminate\Contracts\Foundation\Application;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayVonage\Drivers\VonageDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class VonageSmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sms-gateway-vonage');
    }

    public function packageRegistered(): void
    {
        $this->app->afterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager, Application $app): void {
            $manager->extend('vonage', fn (): VonageDriver => $app->make(VonageDriver::class));
        });

        if ($this->app->bound('sms-gateway')) {
            $this->app->make('sms-gateway')->extend('vonage', fn (): VonageDriver => $this->app->make(VonageDriver::class));
        }
    }
}