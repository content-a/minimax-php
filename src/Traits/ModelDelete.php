<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Traits\Response;

trait ModelDelete
{
    /**
     * Get model with id
     *
     * @param int $id
     *
     */
    public function delete($id)
    {
        $response = $this->client->request('DELETE', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/${id}");
    }
}