<?php

namespace Webimpian\BayarcashSdk\Actions;

trait CallbackVerifications
{
    public function verifyDirectDebitBankApprovalCallbackData(array $callbackData, string $secretKey)
    {
        $callbackChecksum = $callbackData['checksum'];

        $payload = [
            "record_type" => $callbackData['record_type'],
            "approval_date" => $callbackData['approval_date'],
            "approval_status" => $callbackData['approval_status'],
            "mandate_id" => $callbackData['mandate_id'],
            "mandate_reference_number" => $callbackData['mandate_reference_number'],
            "order_number" => $callbackData['order_number'],
            "payer_bank_code_hashed" => $callbackData['payer_bank_code_hashed'],
            "payer_bank_code" => $callbackData['payer_bank_code'],
            "payer_bank_account_no" => $callbackData['payer_bank_account_no'],
            "application_type" => $callbackData['application_type'],
        ];

        ksort($payload);
        $payload = implode('|', $payload);

        return hash_hmac('sha256', $payload, $secretKey) === $callbackChecksum;
    }

    public function verifyDirectDebitAuthorizationCallbackData(array $callbackData, string $secretKey)
    {
        $callbackChecksum = $callbackData['checksum'];

        $payload = [
            'record_type' => $callbackData['record_type'],
            'transaction_id' => $callbackData['transaction_id'],
            'mandate_id' => $callbackData['mandate_id'],
            'exchange_reference_number' => $callbackData['exchange_reference_number'],
            'exchange_transaction_id' => $callbackData['exchange_transaction_id'],
            'order_number' => $callbackData['order_number'],
            'currency' => $callbackData['currency'],
            'amount' => $callbackData['amount'],
            'payer_name' => $callbackData['payer_name'],
            'payer_email' => $callbackData['payer_email'],
            'payer_bank_name' => $callbackData['payer_bank_name'],
            'status' => $callbackData['status'],
            'status_description' => $callbackData['status_description'],
            'datetime' => $callbackData['datetime'],
        ];

        ksort($payload);
        $payload = implode('|', $payload);

        return hash_hmac('sha256', $payload, $secretKey) === $callbackChecksum;
    }

    public function verifyDirectDebitTransactionCallbackData(array $callbackData, string $secretKey)
    {
        $callbackChecksum = $callbackData['checksum'];

        $payload = [
            'record_type' => $callbackData['record_type'],
            'batch_number' => $callbackData['batch_number'],
            'mandate_id' => $callbackData['mandate_id'],
            'mandate_reference_number' => $callbackData['mandate_reference_number'],
            'transaction_id' => $callbackData['transaction_id'],
            'datetime' => $callbackData['datetime'],
            'reference_number' => $callbackData['reference_number'],
            'amount' => $callbackData['amount'],
            'status' => $callbackData['status'],
            'status_description' => $callbackData['status_description'],
            'cycle' => $callbackData['cycle'],
        ];

        ksort($payload);
        $payload = implode('|', $payload);

        return hash_hmac('sha256', $payload, $secretKey) === $callbackChecksum;
    }

    public function verifyTransactionCallbackData(array $callbackData, string $secretKey)
    {
        $callbackChecksum = $callbackData['checksum'];

        $payload = [
            'record_type' => $callbackData['record_type'],
            'transaction_id' => $callbackData['transaction_id'],
            'exchange_reference_number' => $callbackData['exchange_reference_number'],
            'exchange_transaction_id' => $callbackData['exchange_transaction_id'],
            'order_number' => $callbackData['order_number'],
            'currency' => $callbackData['currency'],
            'amount' => $callbackData['amount'],
            'payer_name' => $callbackData['payer_name'],
            'payer_email' => $callbackData['payer_email'],
            'payer_bank_name' => $callbackData['payer_bank_name'],
            'status' => $callbackData['status'],
            'status_description' => $callbackData['status_description'],
            'datetime' => $callbackData['datetime'],
        ];

        ksort($payload);
        $payload = implode('|', $payload);

        return hash_hmac('sha256', $payload, $secretKey) === $callbackChecksum;
    }

    public function verifyPreTransactionCallbackData(array $callbackData, ?string $secretKey)
    {
        $callbackChecksum = $callbackData['checksum'];

        $payload = [
            'record_type' => $callbackData['record_type'],
            'exchange_reference_number' => $callbackData['exchange_reference_number'],
            'order_number' => $callbackData['order_number'],
        ];

        ksort($payload);
        $payload = implode('|', $payload);

        return hash_hmac('sha256', $payload, $secretKey) === $callbackChecksum;
    }
}
