<?php


namespace MinimaxApi\Models;


use GuzzleHttp\Client;
use MinimaxApi\Traits\ModelAdd;
use MinimaxApi\Traits\ModelConstructor;
use MinimaxApi\Traits\ModelDelete;
use MinimaxApi\Traits\ModelGet;
use MinimaxApi\Traits\ModelGetAll;
use MinimaxApi\Traits\ModelUpdate;

class Employee
{
    use ModelConstructor,
        ModelGet,
        ModelGetAll,
        ModelAdd,
        ModelUpdate,
        ModelDelete;

    // Employee id.
    // Mandatory field. Ignored on create request.
    public $EmployeeId;
    // Employee code.
    // Max length: 10
    public $Code;
    // Employee Tax number.
    // Max length: 12
    public $TaxNumber;
    // Employee first name.
    // Mandatory field. Max length: 30
    public $FirstName;
    // Employee last name.
    // Mandatory field. Max length: 250
    public $LastName;
    // Employee address.
    // Max length: 250
    public $Address;
    // Employee postal code.
    // Max length: 30
    public $PostalCode;
    // Employee city.
    // Max length: 250
    public $City;
    // Employee country.
    public $Country;
    // Employee residence country.
    public $CountryOfResidence;
    // Employee date of birth.
    public $DateOfBirth;
    // Employee gender:
    // <ul>
    //     <li>M - Man</li>
    //     <li>Z - Woman</li>
    // </ul>
    //
    // Mandatory field. Max length: 1
    public $Gender;
    // Date of employment.
    public $EmploymentStartDate;
    // Employment end date.
    public $EmploymentEndDate;
    // Notes.
    public $Notes;
    // Employment type:
    // <ul>
    //     <li>ZD - Employed worker</li>
    //     <li>ZL - Employed owner</li>
    //     <li>ZAP - Employed elsewhere</li>
    //     <li>DSP - Pupil or student on compulsory practical training</li>
    //     <li>DD - Seconded worker</li>
    //     <li>ZJD - Employee - community work</li>
    // </ul>
    //
    // Mandatory field. Max length: 30
    public $EmploymentType;
    // Employee Personal identification number.
    // Max length: 30
    public $PersonalIdenficationNumber;
    // Employee Insurance base for employment type ZL and organisation type »Zasebnik«:
    // <ul>
    //     <li>005 - Basis 005,</li>
    //     <li>104 - Basis 104,</li>
    // </ul>
    // EmploymentType ZL and organisation type »Gospodarska družba«:
    // <ul>
    //     <li>040in112 - Basis 040 + 112,</li>
    //     <li>040 - Basis 040,</li>
    //     <li>103 - Basis 103.</li>
    // </ul>
    // Max length: 30
    public $InsuranceBasis;
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
    private $model_name = "employees";
}