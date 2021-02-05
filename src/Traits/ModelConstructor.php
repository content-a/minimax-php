<?php


namespace MinimaxApi\Traits;


use GuzzleHttp\Client;
use MinimaxApi\Models\MinimaxApi;

trait ModelConstructor
{
    /**
     * Model must always accept access token and organisation id.
     * Parameters are set null, because of deserialization.
     *
     * @param string $accessToken
     * @param string $organizationId
     *
     */
    public function __construct($accessToken = null, $organizationId = null)
    {
        $this->accessToken = $accessToken;
        $this->organizationId = $organizationId;

        $this->client = new Client([
            'base_uri' => MinimaxApi::API_URL,
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-type' => 'application/json',
            ],
        ]);
    }

    /**
     * Model must always accept access token and organisation id.
     * Parameters are set null, because of deserialization.
     *
     * @param string $accessToken
     * @param string $organizationId
     *
     */
    public function set($accessToken, $organizationId)
    {
        $this->accessToken = $accessToken;
        $this->organizationId = $organizationId;

        $this->client = new Client([
            'base_uri' => MinimaxApi::API_URL,
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-type' => 'application/json',
            ],
        ]);
    }
}