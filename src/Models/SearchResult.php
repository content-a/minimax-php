<?php


namespace MinimaxApi\Models;


class SearchResult
{
    // Returned rows.
    public $Rows;
    // Number of rows matching search condition.
    public $TotalRows;
    // Current page number. Result rows are returned in pages.
    public $CurrentPageNumber;
    // Numbers of rows returned per page.
    public $PageSize;
}