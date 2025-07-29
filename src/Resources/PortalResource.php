<?php

namespace Webimpian\BayarcashSdk\Resources;

class PortalResource extends Resource
{
    public string $id;
    public string $createdAt;
    public string $portalKey;
    public string $portalName;
    public string $websiteUrl;
    public ?string $transactionNotificationEmail;
    public ?string $secondaryTransactionNotificationEmail;
    public ?string $customPaymentButtonText;
    public int $enabledSmsOnSuccessfulTransaction;
    public bool $splitPaymentEnabled;
    public array $splitPaymentMerchants;
    public array $paymentChannels;
    public array $merchant;
    public ?string $url;
    public ?string $merchantId;
}