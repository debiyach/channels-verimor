<?php

namespace NotificationChannels\Verimor;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class VerimorSmsClient implements ClientInterface
{
    /**
     * @var string
     */
    protected $endpoint = 'https://sms.verimor.com.tr/v2/send.json';

    public function send(VerimorMessage $message): Response
    {
        return Http::post(
            $this->endpoint,
            $message->toArray()
        );
    }
}