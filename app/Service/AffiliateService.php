<?php

namespace App\Service;

use App\Model\AffiliateModel;

class AffiliateService
{
    const DUBLIN_COORDINATES = [
        'latitude' => 53.3340285,
        'longitude' => -6.2535495
    ];

    /**
     * @var float
     */
    protected $km;

    /**
     * @var AffiliateModel
     */
    private $affiliatesModel;

    public function __construct($km)
    {
        $this->km = $km;
        $this->affiliatesModel = new AffiliateModel();
    }

    /**
     * @return array
     */
    public function getAffiliatesClosestDubling(): array
    {
        $closestDubling = [];
        foreach ($this->affiliatesModel->getAffiliates() as $affiliate) {
            $distance = $this->distanceCalculator(
                self::DUBLIN_COORDINATES['latitude'],
                self::DUBLIN_COORDINATES['longitude'],
                $affiliate['latitude'],
                $affiliate['longitude']
            );
            if ($this->km >= $distance) {
                $closestDubling[] = $affiliate;
            }
        }

        return $closestDubling;
    }

    /**
     * @param float $lat1
     * @param float $lon1
     * @param float $lat2
     * @param float $lon2
     * @return float
     */
    private function distanceCalculator(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);

        $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
        $dist = (float)number_format($dist, 2, '.', '');
        return $dist;
    }
}
