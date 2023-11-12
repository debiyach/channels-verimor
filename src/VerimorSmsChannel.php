<?php

namespace NotificationChannels\Verimor;

use Illuminate\Notifications\Notification;
use NotificationChannels\Verimor\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notifiable;

class VerimorSmsChannel
{

    protected $client;

    public function __construct(
        VerimorSmsClient $client
    ) {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param Notifiable $notifiable
     *
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toVerimor')) {
            throw CouldNotSendNotification::methodDoesNotExist();
        }

        $message = $notification->toVerimor($notifiable);

        if (!$message instanceof VerimorMessage) {
            throw CouldNotSendNotification::incorrectMessageClass();
        }

        $response = $this->client->send($message);

        if ($response->failed()) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($response->body());
        }

    }
}
