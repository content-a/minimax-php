<?php


namespace MinimaxApi\Models;



use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\Response;

class VatRate
{
    use ModelConstructor;

    // Vat rate id.
    // Mandatory field. Ignored on create request.
    public $VatRateId;
    // VAT rate codes:
    // <ul>
    //     <li>S - Standard rate</li>
    //     <li>Z - Reduced rate</li>
    //     <li>P - Flat rate</li>
    //     <li>0 - Lower rate</li>
    //     <li>O - Exempted</li>
    //     <li>N - Non-taxable</li>
    // <ul>
    // Mandatory field. Max length: 30
    public $Code;
    // Interest percent.
    public $Percent;
    // VatRate Percentage.
    public $VatRatePercentage;


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
    private $model_name = "vatrates";

    /**
     * Makes http request and return response.
     *
     * @return object
     */
    public function getStandartRate($countryId){
        // Get current date.
        $date = date(MinimaxApi::DATE_FORMAT);

        // Set vat rate code.
        $code = "S";

        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/code(${code})?date=${date}&countryID=${countryId}");

        return Response::model($response, $this);
    }
}