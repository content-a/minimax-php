<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\Response;

class Currency
{
    use ModelConstructor;

    // Currency id.
    public $CurrencyId;
    // Currency code.
    // Max length: 30
    public $Code;
    // Currency name.
    // Max length: 250
    public $Name;

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
    private $model_name = "currencies";

    /**
     * Makes http request and return response.
     *
     * @return object
     */
    public function getDomestic()
    {
        // Get current date.
        $date = date(MinimaxApi::DATE_FORMAT);

        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/date(${date})");

        return Response::model($response, $this);
    }

}