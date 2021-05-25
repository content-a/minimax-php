<?php


namespace MinimaxApi\Models;


use ContentaMinimaxWoocommerce\Helpers\MinimaxHelper;
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
    // Payment type:
    // <ul>
    //     <li>T - bank</li>
    //     <li>G - cash</li>
    //     <li>B - cash register</li>
    //     <li>K - card</li>
    //     <li>D - other</li>
    // <ul>
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

    /**
     * Retrieve credit card payment id.
     *
     */
    public function getCreditCardPayment(){
        return $this->getPaymentByType('K');
    }

    /**
     * Retrieve credit card payment id.
     *
     */
    public function getBankPayment(){
        return $this->getPaymentByType('T');
    }

    /**
     * Get payment method id by type.
     *
     * @param string Payment method type
     */
    public function getPaymentByType($type){
        $paymentMethods = $this->getAll();

        $paymentId = null;

        // Retrieve credit card payment with type K
        foreach($paymentMethods->Rows as $row){
            if($row["Type"] == $type)
                $paymentId = $row["PaymentMethodId"];
        }

        return $paymentId;
    }
}