<?php

namespace Webimpian\BayarcashSdk\Resources;

class FpxBankResource extends Resource
{
    public string $bankName;
    public string $bankDisplayName;
    public string $bankCode;
    public string $bankCodeHashed;
    public bool $bankAvailability;
}
