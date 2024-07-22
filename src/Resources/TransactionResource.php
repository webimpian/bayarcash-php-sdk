<?php

namespace Webimpian\BayarcashSdk\Resources;

class TransactionResource extends Resource
{
    public string $id;
    public string $updatedAt;
    public string $datetime;
    public string $payerName;
    public string $payerEmail;
    public ?string $payerTelephoneNumber;
    public string $orderNumber;
    public ?string $currency;
    public float $amount;
    public ?string $exchangeReferenceNumber;
    public ?string $exchangeTransactionId;
    public ?string $payerBankName;
    public string $status;
    public ?string $statusDescription;
    public ?string $returnUrl;
    public ?array $metadata;
    public ?array $payout;
    public array $paymentGateway;
    public string $portal;
    public array $merchant;
    public ?array $mandate;
}
