<?php


namespace MinimaxApi\Models;


class IssuedInvoiceRow
{


    // Issued invoice id.
    // Mandatory field. Ignored on create request.
    public $IssuedInvoiceRowId;
    // Issued invoice.
    public $IssuedInvoice;
    // Item.
    public $Item;
    // Item name.
    // Max length: 250
    public $ItemName;
    // Issued invoice row number.
    // Mandatory field.
    public $RowNumber;
    // Item code.
    // Max length: 30
    public $ItemCode;
    // Serial number.
    // Max length: 30
    public $SerialNumber;
    // Batch number.
    // Max length: 30
    public $BatchNumber;
    // Item description.
    // Max length: 8000
    public $Description;
    // Item quantity.
    // Mandatory field.
    public $Quantity;
    // Item unit of measurement.
    // Max length: 3
    public $UnitOfMeasurement;
    // Mass of item in kilogram.
    public $Mass;
    // Price.
    // Mandatory field.
    public $Price;
    // Price with included VAT.
    // Mandatory field.
    public $PriceWithVAT;
    // Item VAT percent.
    // Mandatory field.
    public $VATPercent;
    // Discount value in currency.
    // Mandatory field.
    public $Discount;
    // Discount value in percent.
    // Mandatory field.
    public $DiscountPercent;
    // Row value.
    // Mandatory field.
    public $Value;
    // Item VAT rate.
    public $VatRate;
    // Vat rate percentage identifier
    public $VatRatePercentage;
    // Warehouse. Input allowed if settings are set for direct discharge(Inventory).
    public $Warehouse;
    // Tax-free value.
    public $TaxFreeValue;
    // Tax-exemption value.
    public $TaxExemptionValue;
    // VAT accounting type.
    // Max length: 5
    public $VatAccountingType;
    // Analytic.
    public $Analytic;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;


}