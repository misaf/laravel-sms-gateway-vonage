<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayVonage;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayVonage\Drivers\VonageDriver;

final class VonageSmsGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager): void {
            $manager->extend('vonage', fn(Application $app): VonageDriver => $app->make(VonageDriver::class));
        });
    }
}
