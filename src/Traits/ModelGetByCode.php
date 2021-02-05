<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Traits\Response;

trait ModelGetByCode
{
    /**
     * Get model with code
     *
     * @param string $code
     *
     */
    public function getByCode($code)
    {
        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/code(${code})");

        return Response::model($response, $this);

    }
}