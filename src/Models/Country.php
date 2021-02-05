<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\Response;

class Country
{
    use ModelConstructor;

    // Country id.
    // Mandatory field. Ignored on create request.
    public $CountryId;
    // Country code.
    // Max length: 30
    public $Code;
    // Country name.
    // Max length: 250
    public $Name;
    // Country currency.
    public $Currency;

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
    private $model_name = "countries";

    /**
     * Makes http request and return response.
     *
     * @return object
     */
    public function getSlovenia(){
        // Set country code.
        $code = "SI";

        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/code(${code})");

        return Response::model($response, $this);
    }
}