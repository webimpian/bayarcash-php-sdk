<?php

namespace Webimpian\BayarcashSdk\Resources;

class FpxDirectDebitApplicationResource extends Resource
{
    public string $payerName;
    public int $payerIdType;
    public string $payerId;
    public string $payerEmail;
    public string $payerTelephoneNumber;
    public string $orderNumber;
    public float $amount;
    public string $applicationType;
    public string $applicationReason;
    public string $frequencyMode;
    public ?string $effectiveDate;
    public ?string $expiryDate;
    public string $url;
}
