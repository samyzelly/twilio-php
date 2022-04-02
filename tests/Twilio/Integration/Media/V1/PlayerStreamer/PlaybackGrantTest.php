<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Media\V1\PlayerStreamer;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class PlaybackGrantTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->media->v1->playerStreamer("VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->playbackGrant()->create();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://media.twilio.com/v1/PlayerStreamers/VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/PlaybackGrant'
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "VJcafebabecafebabecafebabecafebabe",
                "url": "https://media.twilio.com/v1/PlayerStreamers/VJcafebabecafebabecafebabecafebabe/PlaybackGrant",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "grant": {
                    "playbackUrl": "http://video.net/123/blabla?token=123",
                    "playerStreamerSid": "VJcafebabecafebabecafebabecafebabe",
                    "requestCredentials": null
                }
            }
            '
        ));

        $actual = $this->twilio->media->v1->playerStreamer("VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->playbackGrant()->create();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->media->v1->playerStreamer("VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                    ->playbackGrant()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://media.twilio.com/v1/PlayerStreamers/VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/PlaybackGrant'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "url": "https://media.twilio.com/v1/PlayerStreamers/VJcafebabecafebabecafebabecafebabe/PlaybackGrant",
                "sid": "VJcafebabecafebabecafebabecafebabe",
                "grant": {
                    "playbackUrl": "http://video.net/123/blabla?token=123",
                    "playerStreamerSid": "VJcafebabecafebabecafebabecafebabe",
                    "requestCredentials": null
                }
            }
            '
        ));

        $actual = $this->twilio->media->v1->playerStreamer("VJXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                          ->playbackGrant()->fetch();

        $this->assertNotNull($actual);
    }
}