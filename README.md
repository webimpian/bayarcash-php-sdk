# Bayarcash Payment Gateway PHP SDK

## Introduction

The [Bayarcash](https://bayarcash.com/) SDK provides an expressive interface for interacting with Bayarcash's Payment Gateway API. This SDK supports both API v2 and v3, with enhanced features available in v3.

## Installation

Install the SDK via Composer:

```bash
composer require webimpian/bayarcash-php-sdk
```

## Configuration

### Basic Setup

```php
use Webimpian\BayarcashSdk\Bayarcash;

$bayarcash = new Bayarcash(TOKEN_HERE);

// Optional: Use sandbox environment
$bayarcash->useSandbox();

// Optional: Set API version (default is 'v2')
$bayarcash->setApiVersion('v3');

// Optional: Set custom timeout
$bayarcash->setTimeout(60);
```

### Laravel Integration

1. Add your credentials to `.env`:
```env
BAYARCASH_API_TOKEN=your_token_here
BAYARCASH_API_SECRET_KEY=your_secret_key_here
```

2. Access the SDK:
```php
$bayarcash = app(\Webimpian\BayarcashSdk\Bayarcash::class);
```

## Available Payment Channels

The SDK supports multiple payment channels:

```php
Bayarcash::FPX                 // FPX Online Banking
Bayarcash::FPX_DIRECT_DEBIT   // FPX Direct Debit
Bayarcash::FPX_LINE_OF_CREDIT // FPX Line of Credit
Bayarcash::DUITNOW_DOBW       // DuitNow Online Banking
Bayarcash::DUITNOW_QR         // DuitNow QR
Bayarcash::SPAYLATER          // ShopeePayLater
Bayarcash::BOOST_PAYFLEX      // Boost PayFlex
Bayarcash::QRISOB            // QRIS Online Banking
Bayarcash::QRISWALLET        // QRIS Wallet
Bayarcash::NETS              // NETS
```

## Core Features

### Portal Management

```php
// Get all available portals
$portals = $bayarcash->getPortals();

// Get available payment channels for a specific portal
$channels = $bayarcash->getChannels('your_portal_key');
```

### FPX Bank Integration

```php
// Get list of available FPX banks
$banks = $bayarcash->fpxBanksList();
```

### Payment Intents

```php
// Create a new payment intent
$paymentIntent = $bayarcash->createPaymentIntent([
    'amount' => 100.00,
    'currency' => 'MYR',
    'payment_channel' => Bayarcash::FPX,
    // ... other parameters
]);

// Redirect to payment page
header("Location: " . $paymentIntent->url);

// Get payment intent details (v3 only)
$paymentIntent = $bayarcash->getPaymentIntent('payment_intent_id');
```

### Transaction Management

```php
// Get single transaction
$transaction = $bayarcash->getTransaction('transaction_id');

// V3 API Features
if ($bayarcash->getApiVersion() === 'v3') {
    // Get all transactions with filters
    $transactions = $bayarcash->getAllTransactions([
        'order_number' => 'ORDER123',
        'status' => 'completed',
        'payment_channel' => Bayarcash::FPX,
        'exchange_reference_number' => 'REF123',
        'payer_email' => 'customer@example.com'
    ]);

    // Specialized transaction queries
    $orderTransactions = $bayarcash->getTransactionByOrderNumber('ORDER123');
    $emailTransactions = $bayarcash->getTransactionsByPayerEmail('customer@example.com');
    $statusTransactions = $bayarcash->getTransactionsByStatus('completed');
    $channelTransactions = $bayarcash->getTransactionsByPaymentChannel(Bayarcash::FPX);
    $refTransaction = $bayarcash->getTransactionByReferenceNumber('REF123');
}
```

### Security Features

#### Checksum Generation and Validation

```php
// Generate checksum for payment intent
$checksum = $bayarcash->createPaymentIntenChecksumValue(
    'your_api_secret_key',
    $requestData
);

// Verify callbacks
$validPreTransaction = $bayarcash->verifyPreTransactionCallbackData(
    $callbackData,
    'your_api_secret_key'
);

$validTransaction = $bayarcash->verifyTransactionCallbackData(
    $callbackData,
    'your_api_secret_key'
);

$validTransaction = $bayarcash->verifyReturnUrlCallbackData(
    $callbackData,
    'your_api_secret_key'
);
```

### FPX Direct Debit Features

#### 1. Enrolment

```php
// Generate enrolment checksum
$checksum = $bayarcash->createFpxDirectDebitEnrolmentChecksumValue(
    'your_api_secret_key',
    $enrolmentData
);

// Create enrolment intent
$response = $bayarcash->createFpxDirectDebitEnrollmentIntent([
    'checksum' => $checksum,
    // ... other parameters
]);

// Redirect to enrolment page
header("Location: " . $response->url);
```

#### 2. Maintenance

```php
// Generate maintenance checksum
$checksum = $bayarcash->createFpxDirectDebitMaintenanceChecksumValue(
    'your_api_secret_key',
    $maintenanceData
);

// Create maintenance intent
$response = $bayarcash->createFpxDirectDebitMaintenanceIntent([
    'checksum' => $checksum,
    // ... other parameters
]);

// Redirect to maintenance page
header("Location: " . $response->url);
```

#### 3. Termination

```php
// Create termination intent
$response = $bayarcash->createFpxDirectDebitTerminationIntent($terminationData);

// Redirect to termination page
header("Location: " . $response->url);
```

## Security Recommendations

1. Always use checksums for payment requests when possible
2. Verify all callbacks using the provided verification methods
3. Store and validate transaction IDs to prevent duplicate processing
4. Use HTTPS for all API communications
5. Keep your API tokens and secret keys secure

## API Documentation

For detailed API specifications, please refer to the [Official Bayarcash API Documentation](https://api.webimpian.support/bayarcash).

## Support

For support questions, please contact Bayarcash support or raise an issue in the repository.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for version update history.

## License

This SDK is open-sourced software licensed under the MIT license.