<?php

namespace Webimpian\BayarcashSdk;

use GuzzleHttp\Client as HttpClient;
use Webimpian\BayarcashSdk\Resources\FpxBankResource;
use Webimpian\BayarcashSdk\Resources\PaymentIntentResource;
use Webimpian\BayarcashSdk\Resources\TransactionResource;

class Bayarcash
{
    use Actions\FpxDirectDebitPaymentIntent,
        Actions\CallbackVerifications,
        Actions\ChecksumGenerator,
        MakesHttpRequests;

    /*
     * Payment Channels
     */
    const FPX = 1;
    const FPX_DIRECT_DEBIT = 3;
    const FPX_LINE_OF_CREDIT = 4;
    const DUITNOW_DOBW = 5;

    const DUITNOW_QR = 6;
    const SPAYLATER = 7;
    const BOOST_PAYFLEX = 8;
    const QRISOB = 9;
    const QRISWALLET = 10;

    /**
     * The Bayarcash API Key.
     *
     * @var string
     */
    protected $token;

    /**
     * The Guzzle HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    public $guzzle;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;

    private $sandbox;

    /**
     * Create a new BayarcashSdk instance.
     *
     * @param  string|null  $token
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;

        $this->guzzle = new HttpClient([
            'base_uri' => $this->getBaseUri(),
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Transform the items of the collection to the given class.
     *
     * @param  array  $collection
     * @param  string  $class
     * @param  array  $extraData
     * @return array
     */
    protected function transformCollection($collection, $class, $extraData = [])
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this);
        }, $collection);
    }

    /**
     * Set the api key and setup the guzzle request object.
     *
     * @param  string  $token
     * @param  \GuzzleHttp\Client|null  $guzzle
     * @return $this
     */
    public function setToken($token, $guzzle = null)
    {
        $this->token = $token;

        $this->guzzle = $guzzle ?: new HttpClient([
            'base_uri' => $this->getBaseUri(),
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    /**
     * Set the api key and setup the guzzle request object.
     *
     * @param  \GuzzleHttp\Client|null  $guzzle
     * @return $this
     */
    public function useSandbox($guzzle = null)
    {
        $this->sandbox = true;

        $this->guzzle = $guzzle ?: new HttpClient([
            'base_uri' => $this->getBaseUri(),
            'http_errors' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    /**
     * Set a new timeout.
     *
     * @param  int  $timeout
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * Get the timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    private function getBaseUri()
    {
        $baseUri = 'https://console.bayar.cash/api/v2/';

        if ($this->sandbox) {
            $baseUri = 'https://console.bayarcash-sandbox.com/api/v2/';
        }

        return $baseUri;
    }

    public function fpxBanksList()
    {
        return $this->transformCollection(
            $this->get('banks'),
            FpxBankResource::class,
        );
    }


    public function createPaymentIntent(array $data)
    {
        return new PaymentIntentResource(
            $this->post('payment-intents', $data),
            $this
        );
    }

    public function getTransaction($id)
    {
        return new TransactionResource(
            $this->get('transactions/' . $id),
            $this
        );
    }
}
