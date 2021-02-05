<?php

namespace MinimaxApi\Models;

use Exception;
use GuzzleHttp\Client;
use MinimaxApi\Traits\Response;

class MinimaxApi
{
    public $client;

    private $token;

    /**
     * @var array List of user organizations.
     */
    private $organizations;

    // Credentials variables.
    private $clientId;
    private $clientSecret;
    private $userName;
    private $userPassword;


    // Urls
    const BASE_URL = "https://moj.minimax.si/SI";
    const API_URL = "https://moj.minimax.si/SI/API/";
    const TOKEN_URL = self::BASE_URL . "/aut/oauth20/token";

    // Default date format.
    const DATE_FORMAT = "Y-m-d";

    public function __construct($clientId, $clientSecret, $userName, $userPassword)
    {
        // Set credentials.
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->userName = $userName;
        $this->userPassword = $userPassword;

        // Set http client.
        $this->client = new Client();

        // Retrieve token.
        $this->retrieveToken();

        // Retrieve organizations.
        $this->retrieveOrganizations();
    }

    // Getter access token.
    public function getAccessToken()
    {
        return $this->token->access_token;
    }

    // Getter organizations.
    public function getOrganizations()
    {
        return $this->organizations;
    }

    // Retrieve token.
    public function retrieveToken()
    {
        // Set request parameters.
        $params = [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'password',
            'username' => $this->userName,
            'password' => $this->userPassword,
            'scope' => 'minimax.si'
        ];

        // Send an application/x-www-form-urlencoded POST request.
        $response = $this->client->request('POST', self::TOKEN_URL, [
            'form_params' => $params,
        ]);

        // Save token.
        $this->token = json_decode($response->getBody());
    }

    // Retrieve all organizations.
    public function retrieveOrganizations()
    {
        //
        $response = $this->client->request('GET', self::API_URL . "api/currentuser/orgs", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getAccessToken(),
            ],
        ]);

        // Save Organizations.
        $this->organizations = json_decode($response->getBody(), true)["Rows"];
    }

    // Retrieve organization by id.
    public function retrieveOrganizationById($organisationId)
    {
        $response = $this->client->request('GET', self::API_URL . "api/orgs/${organisationId}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getAccessToken(),
            ],
        ]);

        return Response::make($response);
    }
}
