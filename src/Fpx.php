<?php

namespace Webimpian\BayarcashSdk;

class Fpx
{
    /*
     * Buyer ID Type
     */
    const NRIC = 1;
    const OLD_IC = 2;
    const PASSPORT = 3;
    const BUSINESS_REGISTRATION = 4;
    const OTHERS = 5;

    /*
     * Frequency Mode
     */
    const MODE_DAILY = 'DL';
    const MODE_WEEKLY = 'WK';
    const MODE_MONTHLY = 'MT';
    const MODE_YEARLY = 'YR';

    /*
     * Status Code
     */
    const STATUS_NEW = 0;
    const STATUS_PENDING = 1;
    const STATUS_FAILED = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCELLED = 4;

    public static function getStatusText($statusCode)
    {
        return match ((int)$statusCode) {
            self::STATUS_NEW => 'New',
            self::STATUS_PENDING => 'Pending',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_SUCCESS => 'Successful',
            self::STATUS_FAILED => 'Failed',
            default => 'UNKNOWN STATUS',
        };
    }
}
