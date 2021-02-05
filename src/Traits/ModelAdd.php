<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Traits\Response;

trait ModelAdd
{
    /**
     * Add new model.
     *
     * @return string
     */
    public function add(){
        // Convert filter into json.
        $body = json_encode($this);

        $response = $this->client->request('POST', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name, [
            'body' => $body,
        ]);

        return Response::modelId($response);
    }
}