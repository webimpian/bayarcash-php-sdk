# Bayarcash Payment Gateway PHP SDK

## Introduction

The [Bayarcash](https://bayarcash.com/) SDK provides an expressive interface for interacting with Bayarcash API.

## Official Documentation

### Installation

To install the SDK in your project you need to require the package via composer:

```bash
composer require webimpian/bayarcash-php-sdk
```

### Basic Usage

You can create an instance of the SDK like so:

```php
$bayarcash = new Webimpian\BayarcashSdk\Bayarcash(TOKEN_HERE);
$bayarcash->useSandbox(); // call this method to switch to use sandbox
```

For Laravel user:

```php
// set value for BAYARCASH_API_TOKEN and BAYARCASH_API_SECRET_KEY in the .env file
BAYARCASH_API_TOKEN=
BAYARCASH_API_SECRET_KEY=
```

```php
$bayarcash = app(\Webimpian\BayarcashSdk\Bayarcash::class);
$bayarcash->useSandbox(); // call this method to switch to use sandbox
```

You may create checksum value for your payment request using:

```php
$paymentIntentRequestChecksum = $bayarcash->createPaymentIntenChecksumValue(API_SECRET_KEY, REQUEST_DATA); 

// append checksum value to your REQUEST_DATA
// $data['checksum'] = $paymentIntentRequestChecksum
```

>Note: The checksum value and checksum validation are optional, but it is recommended for enhanced security.

Send your payment request using:

```php
$response = $bayarcash->createPaymentIntent(REQUEST_DATA);
header("Location: " . $response->url); // redirect payer to Bayarcash checkout page.
```

Verify callback using:

```php
// pre-transaction callback
$validResponse = $bayarcash->verifyPreTransactionCallbackData(CALLBACK_DATA, API_SECRET_KEY);
// transaction callback
$validResponse = $bayarcash->verifyTransactionCallbackData(CALLBACK_DATA, API_SECRET_KEY);
```

### FPX Direct Debit

#### 1. FPX Direct Debit Enrolment

```php
$enrolmentRequestChecksum = $bayarcash->createFpxDIrectDebitEnrolmentChecksumValue(API_SECRET_KEY, REQUEST_DATA); 

// append checksum value to your REQUEST_DATA
// $data['checksum'] = $enrolmentRequestChecksum

$response = $this->bayarcashSdk->createFpxDirectDebitEnrollmentIntent($data);
header("Location: " . $response->url); // redirect payer to Bayarcash Fpx Direct Debit enrolment page.
```

#### 2. FPX Direct Debit Maintenance

```php
$maintenanceRequestChecksum = $bayarcash->createFpxDIrectDebitMaintenanceChecksumValue(API_SECRET_KEY, REQUEST_DATA); 

// append checksum value to your REQUEST_DATA
// $data['checksum'] = $maintenanceRequestChecksum

$response = $this->bayarcashSdk->createFpxDirectDebitMaintenanceIntent($data);
header("Location: " . $response->url); // redirect payer to Bayarcash Fpx Direct Debit maintenance page.
```

#### 3. FPX Direct Debit Termination

```php
$response = $this->bayarcashSdk->createFpxDirectDebitTerminationIntent($data);
header("Location: " . $response->url); // redirect payer to Bayarcash Fpx Direct Debit termination page.
```

### Official API Documentation

Please refer to the [Official Bayarcash API Documentation](https://api.webimpian.support/bayarcash) for detailed information about our API.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

