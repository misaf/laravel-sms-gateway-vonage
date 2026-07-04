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
    'base_url' => env('SMS_GATEWAY_VONAGE_BASE_URL', 'https://rest.nexmo.com/'),
],
```

## Driver Behavior

| Option | Value |
| --- | --- |
| Driver name | `vonage` |
| Default base URL | `https://rest.nexmo.com/` |
| `send()` endpoint | `POST sms/json` |
| Authentication | `api_key` and `api_secret` query parameters from `services.vonage.api_key` and `services.vonage.api_secret` |
| Payload | Form data sent directly to Vonage |

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('vonage')->send([
    'from' => 'Laravel',
    'to'   => '14155550100',
    'text' => 'Hello from Vonage',
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
