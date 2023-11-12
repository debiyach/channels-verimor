<?php

namespace NotificationChannels\Verimor;

class VerimorSmsMessage extends VerimorMessage
{
    /**
     * @var Message[] $messages
     */
    protected $messages = [];

    /**
     * @param Message $message
     * @return $this
     */
    public function message(Message $message)
    {
        $this->messages[] = $message->toArray();

        return $this;
    }

    public function toArray(): array
    {
        $payload = [
            'username' =>  $this->username ?? config('verimor-notification-channel.username'),
            'password' => $this->password ?? config('verimor-notification-channel.password'),
            'source_addr' => $this->title ?? config('verimor-notification-channel.from'),
            'valid_for' => $this->validFor ?? config('verimor-notification-channel.valid_for'),
            'datacoding' => $this->dataCoding ?? config('verimor-notification-channel.data_coding'),
            'is_commercial' => $this->isCommercial ?? config('verimor-notification-channel.is_commercial'),
            'iys_recipient_type' => $this->iysRecipientType ?? config('verimor-notification-channel.iys_recipient_type'),
            'messages' => $this->messages
        ];

        if (isset($this->sendAt) && !empty($this->sendAt)) {
            $payload['send_at'] = $this->sendAt;
        }

        if (isset($this->customId) && !empty($this->customId)) {
            $payload['custom_id'] = $this->customId;
        }

        return $payload;
    }
}