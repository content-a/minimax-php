<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\ModelGetAll;

class PaymentMethod
{
    use ModelConstructor,
        ModelGetAll;

    // Payment method id.
    // Mandatory field. Ignored on create request.
    public $PaymentMethodId;
    // Payment method name.
    // Mandatory field. Max length: 250
    public $Name;
    // Payment type.
    // Mandatory field. Max length: 1
    public $Type;
    // Usage.
    // Mandatory field. Max length: 1
    public $Usage;
    // Default payment method among cash or non-cash payment types.
    // Mandatory field. Max length: 1
    public $Default;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Access token.
     */
    protected $accessToken;

    /**
     * Organisation id.
     */
    protected $organizationId;

    /**
     * Model name.
     */
    private $model_name = "paymentMethods";
}