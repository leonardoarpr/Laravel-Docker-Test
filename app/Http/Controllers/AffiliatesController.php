<?php

namespace App\Http\Controllers;

use App\Service\AffiliateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AffiliatesController extends BaseController
{
    public function getAffiliates(Request $response, float $km = 100): JsonResponse
    {
        $affiliatesService = new AffiliateService($km);
        return new JsonResponse($affiliatesService->getAffiliatesClosestDubling());
    }
}
