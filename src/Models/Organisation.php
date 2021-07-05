<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;

class Organisation
{
    // Organisation id.
    // Mandatory field. Ignored on create request.
    public $OrganisationId;
    // Organisation title.
    // Mandatory field. Max length: 100
    public $Title;
    // Organisation address.
    // Max length: 30
    public $Address;
    // Organisation postal code.
    // Max length: 30
    public $PostalCode;
    // Organisation city.
    // Max length: 250
    public $City;
    // Organisation country.
    public $Country;
    // Organisation tax number.
    public $TaxNumber;
    // Organisation registration number.
    public $RegistrationNumber;
    // Organisation VAT identification number.
    public $VATIdentificationNumber;
    // User according to the status of administrator.
    public $Administrator;
    // Status:
    // <ul>
    //     <li>V – Activated</li>
    //     <li>B - Deleted</li>
    // <ul>
    public $Status;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;
}