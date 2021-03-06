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
     * @param string $searchString
     *
     * @return object
     */
    public function getAll($searchString = null){

        $url = MinimaxApi::API_URL . "api/orgs/" . $this->organizationId . "/" . $this->model_name;

        // If parameters are set, add them to url.
        if($searchString != null){
            $parametersUrl = urlencode($searchString);
            $url .= "?SearchString=" . $parametersUrl;
        }

        $response = $this->client->request('GET', $url);

        return Response::searchResult($response);
    }
}