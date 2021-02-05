<?php


namespace MinimaxApi\Traits;

use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Models\SearchFilter;
use MinimaxApi\Models\SearchResult;
use MinimaxApi\Traits\Response;

trait ModelGetAll
{
    /**
     * Get all models.
     *
     * @param SearchFilter $searchFilter
     *
     * @return object
     */
    public function getAll($searchFilter = null){
        // If no search filter is passed, create empty one.
        if($searchFilter == null)
            $searchFilter = new SearchFilter();

        // Convert filter into json.
        $body = json_encode($searchFilter);

        $response = $this->client->request('GET', MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name, [
            'body' => $body,
        ]);

        return Response::searchResult($response);
    }
}