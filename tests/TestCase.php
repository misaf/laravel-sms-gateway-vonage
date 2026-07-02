<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayVonage\Tests;

use Illuminate\Support\Facades\Http;
use Misaf\LaravelSmsGateway\SmsGatewayServiceProvider;
use Misaf\LaravelSmsGatewayVonage\VonageSmsGatewayServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Override;

abstract class TestCase extends TestbenchTestCase
{
    #[Override]
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }

    protected function getPackageProviders($app): array
    {
        return [
            SmsGatewayServiceProvider::class,
            VonageSmsGatewayServiceProvider::class,
        ];
    }
}