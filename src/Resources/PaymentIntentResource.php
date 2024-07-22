<?php

namespace Webimpian\BayarcashSdk\Resources;

class PaymentIntentResource extends Resource
{

    public string $payerName;
    public string $payerEmail;
    public ?string $payerTelephoneNumber;
    public string $orderNumber;
    public float $amount;
    public string $url;
}
