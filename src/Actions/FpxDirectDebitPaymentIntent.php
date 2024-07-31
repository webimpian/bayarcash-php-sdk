<?php

namespace Webimpian\BayarcashSdk\Actions;

use Webimpian\BayarcashSdk\Resources\FpxDirectDebitApplicationResource;
use Webimpian\BayarcashSdk\Resources\FpxDirectDebitResource;
use Webimpian\BayarcashSdk\Resources\TransactionResource;

trait FpxDirectDebitPaymentIntent
{
    public function createFpxDirectDebitEnrollment(array $data)
    {
        return new FpxDirectDebitApplicationResource(
            $this->post('mandates', $data),
            $this
        );
    }

    public function createFpxDirectDebitMaintenance($mandateId, array $data)
    {
        return new FpxDirectDebitApplicationResource(
            $this->put('mandates/' . $mandateId, $data),
            $this
        );
    }

    public function createFpxDirectDebitTermination($mandateId, array $data)
    {
        return new FpxDirectDebitApplicationResource(
            $this->delete('mandates/' . $mandateId, $data),
            $this
        );
    }

    public function getfpxDirectDebitransaction($id)
    {
        return new TransactionResource(
            $this->get('mandates/transactions/' . $id),
        );
    }

    public function getFpxDirectDebit($id)
    {
        return new FpxDirectDebitResource(
            $this->get('mandates/' . $id),
        );
    }
}
