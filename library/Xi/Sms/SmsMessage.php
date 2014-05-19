<?php

/**
 * This file is part of the Xi SMS package.
 *
 * For copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xi\Sms;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="SmsMessage")
 * @ORM\Entity()
 */
class SmsMessage extends BasicEntity
{
	/**
	 * $ORM\Column(name="id", type="integer")
	 */
	private $id;

    /**
     * @var string
     * @ORM\Column(name="body", type="string")
     */
    private $body;

    /**
     * @var string
     * @ORM\Column(name="from", type="string")
     */
    private $from;

    /**
     *
     * @ORM\Column(name="timestamp", name="datetime")
     */
    private $timestamp;

    /**
     * @var array
     * @ORM\Column(name="to", type="string")
     */
    private $to = array();

    /**
     * @param string $body
     * @param string $from
     * @param array|string $to
     */
    public function __construct($body = null, $from = null, $to = array())
    {
        $this->body = $body;
        $this->from = $from;

        if ($to) {
            $this->setTo($to);
        }

        $this->timestamp = new \DateTime('now');
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return null|string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets receiver or an array of receivers
     *
     * @param string|array $to
     */
    public function setTo($to)
    {
        if (!is_array($to)) {
            $to = array($to);
        }
        $this->to = $to;
    }

    /**
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function addTo($to)
    {
        $this->to[] = $to;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }
}
