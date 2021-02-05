<?php


namespace MinimaxApi\Models;


class SearchFilter
{
    // Search string.
    public $SearchString;
    // Current page index starting with 1 for first page.
    public $CurrentPage;
    // Page size defines number of records returned per page.
    public $PageSize;
    // Field name that is used for sorting/ordering result rows.
    public $SortField;
    // Sort order: A - ascending; D - descending
    public $Order;


}