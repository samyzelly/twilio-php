<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Trustedcomms;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CurrentCallTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->trustedComms->currentCalls()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/TrustedComms/CurrentCall'
        ));
    }

    public function testReadFoundResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "CAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "from": "+15000000000",
                "to": "+573000000000",
                "reason": "Hello Jhon, your appointment has been confirmed.",
                "created_at": "2019-05-01T20:00:00Z",
                "url": "https://preview.twilio.com/TrustedComms/CurrentCall"
            }
            '
        ));

        $actual = $this->twilio->preview->trustedComms->currentCalls()->fetch();

        $this->assertNotNull($actual);
    }
}