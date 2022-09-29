<?php

final class VendorTestCase extends \Tests\TestCase
{

    /** @dataProvider distancesData */
    public function testAffiliatesClosestDubling($km): void
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://nginx/affiliates/distance/$km");
        dump(json_decode($response->getBody()));
        $this->assertEquals(
            200,
            $response->getStatusCode(),
            'true'
        );
    }

    public function testAffiliatesClosestDublingFail(): void
    {
        $this->expectException(Exception::class);

        $client = new \GuzzleHttp\Client();
        $client->get("http://nginx/affiliates/distance/abc");

        $this->fail('Exception fail');
    }

    public static function distancesData():array
    {
        return [
            [10],
            [500],
            [1000],
            [100000]
        ];

    }
}
