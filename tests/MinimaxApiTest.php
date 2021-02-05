<?php

namespace MinimaxApi\Tests;

use Dotenv\Dotenv;
use JMS\Serializer\SerializerBuilder;
use MinimaxApi\Models\Country;
use MinimaxApi\Models\Currency;
use MinimaxApi\Models\Item;
use MinimaxApi\Models\MinimaxApi;
use MinimaxApi\Models\mMApiFkField;
use MinimaxApi\Models\SearchFilter;
use MinimaxApi\Models\VatRate;
use MinimaxApi\Traits\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MinimaxApiTest extends TestCase
{

    public function testItem(){
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
        $dotenv->load();

        // Create minimax with credentials.
        $minimax = new MinimaxApi($_ENV["CLIENT_ID"], $_ENV["CLIENT_SECRET"], $_ENV["USER_NAME"], $_ENV["USER_PASSWORD"]);

        // Get first organization.
        $organizationId = $minimax->getOrganizations()[0]["Organisation"]["ID"];

        // Get country Slovenia.
        $country = new Country($minimax->getAccessToken(), $organizationId);
        $country = $country->getSlovenia();

        // Country also contains domestic currency.
        $currencyId = $country->Currency["ID"];

        // Retrieve standart vat rate.
        $vatrate = new VatRate($minimax->getAccessToken(), $organizationId);
        $vatrate = $vatrate->getStandartRate($country->CountryId);

        // Create Item.
        $create_item = new Item($minimax->getAccessToken(), $organizationId);
        $create_item->Name = "Testni artikel";
        $create_item->Code = "TEST-1";
        $create_item->ItemType = "I";
        $create_item->Currency = new mMApiFkField($currencyId);
        $create_item->VatRate = new mMApiFkField($vatrate->VatRateId);
//        $itemId = $create_item->add();


        // Retrieve all items.
        $item = new Item($minimax->getAccessToken(), $organizationId);
        $items = $item->getAll();


        // Retrieve item by code.
        $item_code = new Item($minimax->getAccessToken(), $organizationId);
        $item_code = $item_code->getByCode("TEST-1");


        //Update item.
        $item_code->Name = "Testni artikel POSODOBLJEN2";
        // If updating current object, we need to pass constructor parameters.
        $item_code->set($minimax->getAccessToken(), $organizationId);
        $item_code->update($item_code->ItemId);

        // Delete item.
        $item = new Item($minimax->getAccessToken(), $organizationId);
        $item->delete($item_code->ItemId);

    }
}
