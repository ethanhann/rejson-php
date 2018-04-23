<?php

namespace Ehann\Tests\ReJson;

use Ehann\ReJson\ReJsonClient;
use Ehann\Tests\AbstractTestCase;

class ReJsonClientTest extends AbstractTestCase
{
    /** @var ReJsonClient */
    private $subject;

    public function setUp()
    {
        $this->subject = new ReJsonClient($this->redisClient);
    }

    public function tearDown()
    {
        $this->redisClient->flushAll();
    }

    public function testShouldSetJson()
    {
        $json = json_encode([
            'first_name' => 'Optimus',
            'last_name' => 'Prime',
        ]);
        $key = 'foo';

        $result = $this->subject->set('foo', $json);

        var_dump($result);
    }
}
