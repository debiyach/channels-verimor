<?php

namespace NotificationChannels\Verimor;

use DateTime;
use Illuminate\Contracts\Support\Arrayable;

abstract class VerimorMessage implements Arrayable
{
    /**
     *
     * @var string
     */
    protected $username;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $validFor;

    /**
     * @var int
     */
    protected $dataCoding;

    /**
     * @var bool
     */
    protected $isCommercial;

    /**
     * @var string
     */
    protected $iysRecipientType;

    /**
     * @var string
     */
    protected $customId;

    /**
     * @var string
     */
    protected $sendAt;

    /**
     * @param string $username
     * @return $this
     */
    public function username($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function password($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function title($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $validFor valid range '00:01' - '48:00'.
     * @return $this
     */
    public function validFor($validFor)
    {
        $this->validFor = $validFor;

        return $this;
    }

    /**
     * @param bool $dataCoding
     * @return $this
     */
    public function dataCoding(bool $dataCoding)
    {
        $this->dataCoding = (int) $dataCoding;

        return $this;
    }

    /**
     * @param bool $isCommercial
     * @return $this
     */
    public function isCommercial(bool $isCommercial)
    {
        $this->isCommercial = $isCommercial;

        return $this;
    }

    /**
     * @param string $iysRecipientType
     * @return $this
     */
    public function iysRecipientType(string $iysRecipientType)
    {
        if (!in_array($iysRecipientType, ['BIREYSEL', 'TACIR'])) {
            throw new \InvalidArgumentException('Invalid IYS Recipient Type');
        }

        $this->iysRecipientType = $iysRecipientType;

        return $this;
    }

    /**
     * @param DateTime $sendAt
     * @return $this
     */
    public function sendAt(DateTime $sendAt)
    {
        $this->sendAt = $sendAt->format(DateTime::ATOM);

        return $this;
    }

    /**
     * @param string $customId
     * @return $this
     */
    public function customId($customId)
    {
        $this->customId = $customId;

        return $this;
    }
}
