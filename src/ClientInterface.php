<?php

namespace NotificationChannels\Verimor;

use Illuminate\Http\Client\Response;

interface ClientInterface
{
    public function send(VerimorMessage $message): Response;
}