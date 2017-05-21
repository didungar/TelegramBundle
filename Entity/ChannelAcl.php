<?php

namespace DidUngar\TelegramBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChannelAcl
 *
 * @ORM\Table("TelegramChannelAcl")
 * @ORM\Entity()
 */
class ChannelAcl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="chat_id", type="integer")
     */
    private $chatId;

    /**
     * @var string
     *
     * @ORM\Column(name="acl", type="string", length=150)
     */
    private $acl;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chatId
     *
     * @param integer $chatId
     *
     * @return ChannelAcl
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * Get chatId
     *
     * @return integer
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * Set acl
     *
     * @param string $acl
     *
     * @return ChannelAcl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;

        return $this;
    }

    /**
     * Get acl
     *
     * @return string
     */
    public function getAcl()
    {
        return $this->acl;
    }
}

