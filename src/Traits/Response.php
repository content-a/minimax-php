<?php


namespace MinimaxApi\Traits;


use MinimaxApi\Models\Item;
use MinimaxApi\Models\SearchResult;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

trait Response
{

    /**
     * Deserialize json to object.
     *
     * @param ResponseInterface $response
     * @param $model
     *
     * @return object
     */
    public static function model($response, $model)
    {
        // Set json encoder.
        $encoders = [new JsonEncoder()];

        // Set object normalizer.
        $normalizers = [new ObjectNormalizer()];

        // Set serializer.
        $serializer = new Serializer($normalizers, $encoders);

        // Deserialize.
        $model = $serializer->deserialize($response->getBody(), get_class($model), 'json');

        return $model;
    }

    /**
     * Deserialize json to object.
     *
     * @param ResponseInterface $response
     * @param $model
     *
     * @return object
     */
    public static function searchResult($response)
    {
        // Set json encoder.
        $encoders = [new JsonEncoder()];

        // Set object normalizer.
        $normalizers = [new ObjectNormalizer()];

        // Set serializer.
        $serializer = new Serializer($normalizers, $encoders);

        // Deserialize.
        $model = $serializer->deserialize($response->getBody(), SearchResult::class, 'json');

        return $model;
    }

    /**
     * Retrieve model id from response.
     *
     * @param ResponseInterface $response
     *
     * @return string
     */
    public static function modelId($response)
    {
        // "Location":["https:\/\/moj.minimax.si\/SI\/API\/api\/orgs\/184998\/items\/5356644?id=5356644"
        // Retrieve header with name Location.
        $locationHeader = $response->getHeader('Location')[0];
        // Model id is at the end of string.
        $id = substr($locationHeader, strrpos($locationHeader, "=") + 1);

        return $id;
    }
}