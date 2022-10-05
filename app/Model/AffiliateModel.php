<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AffiliateModel extends Model
{
    /**
     * @var array
     */
    protected $affiliates;

    public function __construct()
    {
        $this->affiliates = $this->getAffiliatesArray();
    }

    protected function getAffiliatesArray()
    {
        $json = Storage::disk('local')->get('public/clientList/affiliates.json');
        $affiliates = json_decode($json, true);
        return $affiliates['affiliates'];
    }

    public function getAffiliates(){
        return $this->affiliates;
    }
}
