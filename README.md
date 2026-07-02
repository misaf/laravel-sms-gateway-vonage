# Laravel SMS Gateway Vonage Driver

Vonage SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-vonage
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=vonage
SMS_GATEWAY_VONAGE_APIKEY=your-api-key
SMS_GATEWAY_VONAGE_API_SECRET=your-api-secret
```

```php
// config/services.php
'vonage' => [
    'api_key'    => env('SMS_GATEWAY_VONAGE_APIKEY'),
    'api_secret' => env('SMS_GATEWAY_VONAGE_API_SECRET'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('vonage')->send([
    'to'   => '15551234567',
    'from' => 'Example',
    'text' => 'Hello',
]);
```

The payload is passed directly to Vonage, so use the fields expected by the Vonage API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('vonage')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
