<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Traits\Response;

trait ModelGet
{
    /**
     * Get model with id
     *
     * @param int $id
     *
     * @return object
     */
    public function get($id)
    {
        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/${id}");

        return Response::model($response, $this);
    }
}