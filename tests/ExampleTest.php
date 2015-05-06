<?php

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $params   = [
            "user_id"    => "16",
            "start_time" => "2015-05-05T21:42:29-05:00",
            "end_time"   => "2015-05-05T21:43:29-05:00"
        ];
        $response = $this->call('POST', '/api/time', $params);

        $this->assertResponseOk();
    }

}
