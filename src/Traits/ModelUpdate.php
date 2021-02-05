<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Traits\Response;

trait ModelUpdate
{
    /**
     * Update model with id
     *
     * @param int $id
     *
     */
    public function update($id)
    {
        // Convert array into json.
        $data = json_encode($this);

        $response = $this->client->request('PUT', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name . "/${id}",[
            'body' => $data,
        ]);
    }
}