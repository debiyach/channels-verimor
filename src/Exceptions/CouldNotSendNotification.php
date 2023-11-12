<?php

namespace NotificationChannels\Verimor\Exceptions;

use Exception;
use NotificationChannels\Verimor\VerimorMessage;

class CouldNotSendNotification extends Exception
{
    public static function serviceRespondedWithAnError(string $response)
    {
        return new static($response);
    }

    public static function methodDoesNotExist()
    {
        return new static('The toVerimor method does not exist in your notification class.');
    }

    public static function incorrectMessageClass()
    {
        return new static(
            sprintf(
                'Your notification is incorrectly formatted or needs to use an instance of the %s class.',
                VerimorMessage::class
            )

        );
    }
}
