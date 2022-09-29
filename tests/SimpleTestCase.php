<?php

final class SimpleTestCase extends \Tests\TestCase
{

    /** @dataProvider distancesData */
    public function testAffiliatesClosestDubling($km): void
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("http://localhost/affiliates/distance/$km");
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
        $client->get('http://localhost/affiliates/distance/abc');

        $this->fail('Exception fail');
    }

    public static function distancesData(): array
    {
        return [
            [10],
            [500],
            [1000],
            [100000]
        ];

    }
}
