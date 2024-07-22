<?php

namespace Webimpian\BayarcashSdk;

class FpxDirectDebit
{
    /*
     * Application Type
     */
    const ENROLMENT = '01';
    const MAINTENANCE = '02';
    const TERMINATION = '03';

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
    const STATUS_WAITING_APPROVAL = 1;
    const STATUS_FAILED_BANK_VERIFICATION = 2;
    const STATUS_ACTIVE = 3;
    const STATUS_TERMINATED = 4;
    const STATUS_APPROVED = 5;
    const STATUS_REJECTED = 6;
    const STATUS_CANCELLED = 7;
    const STATUS_ERROR = 8;

    public static function getStatusText($statusCode)
    {
        return match ((int)$statusCode) {
            self::STATUS_NEW => 'New',
            self::STATUS_WAITING_APPROVAL => 'Waiting Approval',
            self::STATUS_FAILED_BANK_VERIFICATION => 'Bank Verification Failed',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_CANCELLED => 'Cancelled',
            self::STATUS_ERROR => 'Error',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_TERMINATED => 'Terminated',
            default => 'UNKNOWN STATUS',
        };
    }

    public static function getApplicationTypeText($statusCode)
    {
        return match ($statusCode) {
            self::ENROLMENT => 'Enrollment',
            self::MAINTENANCE => 'Maintenance',
            self::TERMINATION => 'Termination',
        };
    }

    public static function getFrequencyModeText($frequencyModeCode)
    {
        return match ($frequencyModeCode) {
            self::MODE_DAILY => 'Daily',
            self::MODE_WEEKLY => 'Weekly',
            self::MODE_MONTHLY => 'Monthly',
            self::MODE_YEARLY => 'Yearly',
        };
    }
}
