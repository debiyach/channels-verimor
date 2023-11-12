<?php

namespace NotificationChannels\Verimor;

use Illuminate\Contracts\Support\Arrayable;

class Message implements Arrayable
{
    /**
     * The message content.
     *
     * @var string
     */
    protected $content;

    /**
     * The phone number the message should be sent to.
     *
     * @var string
     */
    protected $to;

    /**
     *
     * @var string
     */
    protected $id;

    public function __construct(
        string $content, string $to, string $id = null
    )
    {
        $this->content = $content;
        $this->to = $to;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function content()
    {
       return $this->content;
    }

    /**
     * @return string
     */
    public function to()
    {
        return $this->to;
    }

    /**
     * @return string|null
     */
    public function id()
    {
        return $this->id;
    }


    public function toArray(): array
    {
        $payload = [
            'msg' => $this->content,
            'dest' => $this->to,
        ];

        if (isset($this->id) && !empty($this->id)){
            $payload['id'] = $this->id;
        }

        return $payload;
    }
}