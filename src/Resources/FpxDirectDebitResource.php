<?php

namespace Webimpian\BayarcashSdk\Resources;

class FpxDirectDebitResource extends Resource
{
    public string $id;
    public string $updatedAt;
    public ?string $mandateReferenceNumber;
    public string $orderNumber;
    public string $applicationReason;
    public ?string $frequencyMode;
    public ?string $frequencyModeLabel;
    public ?string $effectiveDate;
    public ?string $expiryDate;
    public string $currency;
    public float $amount;
    public string $payerName;
    public string $payerId;
    public int $payerIdType;
    public string $payerBankAccountNumber;
    public string $payerEmail;
    public string $payerTelephoneNumber;
    public string $status;
    public string $statusDescription;
    public ?string $returnUrl;
    public ?array $metadata;
    public string $portal;
    public array $merchant;
}
