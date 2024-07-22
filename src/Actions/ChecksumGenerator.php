<?php

namespace Webimpian\BayarcashSdk\Actions;

trait ChecksumGenerator
{
    public function createChecksumValue($secretKey, $payload)
    {
        ksort($payload);
        $payloadString = implode('|', $payload);

        return hash_hmac('sha256', $payloadString, $secretKey);
    }

    public function createPaymentIntenChecksumValue($secretKey, $data)
    {
        $payload = [
            'payment_channel' => $data['payment_channel'],
            'order_number' => $data['order_number'],
            'amount' => $data['amount'],
            'payer_name' => $data['payer_name'],
            'payer_email' => $data['payer_email'],
        ];

        ksort($payload);
        $payloadString = implode('|', $payload);

        return hash_hmac('sha256', $payloadString, $secretKey);
    }

    public function createFpxDIrectDebitEnrolmentChecksumValue($secretKey, $data)
    {
        $payload = [
            'order_number' => $data['order_number'],
            'amount' => $data['amount'],
            'payer_name' => $data['payer_name'],
            'payer_email' => $data['payer_email'],
            'payer_telephone_number' => $data['payer_telephone_number'],
            'payer_id_type' => $data['payer_id_type'],
            'payer_id' => $data['payer_id'],
            'application_reason' => $data['application_reason'],
            'frequency_mode' => $data['frequency_mode'],
        ];

        ksort($payload);
        $payloadString = implode('|', $payload);

        return hash_hmac('sha256', $payloadString, $secretKey);
    }

    public function createFpxDIrectDebitMaintenanceChecksumValue($secretKey, $data)
    {
        $payload = [
            'amount' => $data['amount'],
            'payer_email' => $data['payer_email'],
            'payer_telephone_number' => $data['payer_telephone_number'],
            'application_reason' => $data['application_reason'],
            'frequency_mode' => $data['frequency_mode'],
        ];

        ksort($payload);
        $payloadString = implode('|', $payload);

        return hash_hmac('sha256', $payloadString, $secretKey);
    }
}
