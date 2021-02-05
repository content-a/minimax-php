<?php


namespace MinimaxApi\Models;

/// Link with id, name and url to related data.
class mMApiFkField
{
    // Record id.
    public $ID;
    // Record name.
    public $Name = null;
    // Url to full record details.
    public $ResourceUrl = null;

    public function __construct($id){
        $this->ID = $id;
    }
}