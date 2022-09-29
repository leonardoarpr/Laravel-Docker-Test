<?php

namespace App\Model;

class AffiliateModel
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
        $json = base_path() .'/clientList/affiliates.json';
        $affiliates = json_decode(file_get_contents($json), true);
        return $affiliates['affiliates'];
    }

    public function getAffiliates(){
        return $this->affiliates;
    }

}
