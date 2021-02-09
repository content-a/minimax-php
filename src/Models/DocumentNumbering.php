<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\ModelGet;
use MinimaxApi\Traits\ModelGetAll;

class DocumentNumbering
{
    use ModelConstructor,
        ModelGet,
        ModelGetAll;

    // DocumentNumbering id.
    // Mandatory field. Ignored on create request.
    public $DocumentNumberingId;
    // Document numbering codes.<br/>
    // <ul>
    //     <li>IR – Issued invoice</li>
    //     <li>PD – Proforma invoice</li>
    //     <li>PR – Received invoice</li>
    // </ul>
    //
    // Max length: 2
    public $Document;
    // Code.
    // Max length: 250
    public $Code;
    // Name.
    // Max length: 250
    public $Name;
    // Default:
    // <ul>
    //     <li>D - Yes</li>
    //     <li>N - No</li>
    // </ul>
    //
    // Max length: 1
    public $Default;
    // Reference number used on invoices.
    // Max length: 250
    public $ReferenceNumber;
    // Usage:
    // <ul>
    //     <li>D - Yes</li>
    //     <li>N - No</li>
    // </ul>
    //
    // Max length: 1
    public $Usage;
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
    private $model_name = "document-numbering";


}