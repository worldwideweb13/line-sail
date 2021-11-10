<?php

namespace App\Services\Line\Event;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;

class InitializeService
{


    public function Initialize($parameters)
    {

        new LINEBot(
            new CurlHTTPClient($parameters['line_access_token']),
            ['channelSecret' => $parameters['line_channel_secret']]
        );
    }
}