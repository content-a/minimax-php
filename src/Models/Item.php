<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelAdd;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\ModelDelete;
use MinimaxApi\Traits\ModelGet;
use MinimaxApi\Traits\ModelGetAll;
use MinimaxApi\Traits\ModelGetByCode;
use MinimaxApi\Traits\ModelUpdate;
use Psr\Http\Message\ResponseInterface;

class Item
{
    use ModelConstructor,
        ModelGet,
        ModelGetByCode,
        ModelGetAll,
        ModelAdd,
        ModelUpdate,
        ModelDelete;

    // Item id.
    // Mandatory field. Ignored on create request.
    public $ItemId;
    // Item name.
    // Mandatory field. Max length: 250
    public $Name;
    // Item code.
    // Max length: 30
    public $Code;
    // EAN code.
    // Max length: 30
    public $EANCode;
    // Item description.
    // Max length: 8000
    public $Description;
    // <br />Item type:
    // <ul>
    //     <li>B – Goods,</li>
    //     <li>M – Material,</li>
    //     <li>P - Semifinished product,</li>
    //     <li>I – Product,</li>
    //     <li>S – Services,</li>
    //     <li>A - Advance payment,</li>
    //     <li>AS - Pre payments for services</li>
    // </ul>
    // Mandatory field. Max length: 2
    public $ItemType;
    // Defines whether are stocks managed only by quantity.
    // <ul>
    //     <li>N - stocks are managed by quantity and value</li>
    //     <li>D - stocks are managed only by quantity</li>
    // </ul>
    // <br />
    // Default value: N.
    // Mandatory field. Max length: 2
    public $StocksManagedOnlyByQuantity = "D";
    // Item unit of measurement.
    // Max length: 3
    public $UnitOfMeasurement;
    // Mass per unit.
    public $MassPerUnit;
    // Item VAT rate.
    public $VatRate;
    // Item selling price.
    // Mandatory field.
    public $Price;
    // Margin percent.
    // Mandatory field.
    public $RebatePercent;
    // Usage:
    // <ul>
    //     <li>D – yes,</li>
    //     <li>N – no.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $Usage;
    // Selling price currency.
    public $Currency;
    // SerialNumbers:
    // <ul>
    //     <li>D – yes,</li>
    //     <li>N – no.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $SerialNumbers;
    // BatchNumbers:
    // <ul>
    //     <li>D – yes,</li>
    //     <li>N – no.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $BatchNumbers;
    // Domestic market revenue account.
    public $RevenueAccountDomestic;
    // Revenue account for EU markets.
    public $RevenueAccountEU;
    // Revenue account outside EU markets.
    public $RevenueAccountOutsideEU;
    // Stock account.
    public $StocksAccount;
    // Article relief by composite when issuing from warehouse:
    // <ul>
    //     <li>D – yes,</li>
    //     <li>N – no.</li>
    // </ul>
    // Ignored on create request. Max length: 1
    public $ReliefByCompositeFromWarehouse;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;

    /**
     * @var Client
     */
    protected $client;

    /**
     * Access token.
     */
    protected $accessToken;

    /**
     * Organisation id.
     */
    protected $organizationId;

    /**
     * Model name.
     */
    private $model_name = "items";

}