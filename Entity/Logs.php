<?php

namespace DidUngar\TelegramBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logs
 *
 * @ORM\Table("TelegramLogs")
 * @ORM\Entity()
 */
class Logs
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
     * @ORM\Column(name="message_id", type="integer")
     */
    private $messageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_id", type="integer")
     */
    private $fromId;

    /**
     * @var string
     *
     * @ORM\Column(name="from_first_name", type="string", length=50)
     */
    private $fromFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="from_last_name", type="string", length=50)
     */
    private $fromLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="from_username", type="string", length=50)
     */
    private $fromUsername;

    /**
     * @var integer
     *
     * @ORM\Column(name="chat_id", type="integer")
     */
    private $chatId;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_first_name", type="string", length=50)
     */
    private $chatFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_last_name", type="string", length=50)
     */
    private $chatLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="chat_username", type="string", length=50)
     */
    private $chatUsername;

    /**
     * @var integer
     *
     * @ORM\Column(name="quand", type="bigint")
     */
    private $quand;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;


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
     * Set messageId
     *
     * @param integer $messageId
     *
     * @return Logs
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * Get messageId
     *
     * @return integer
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set fromId
     *
     * @param integer $fromId
     *
     * @return Logs
     */
    public function setFromId($fromId)
    {
        $this->fromId = $fromId;

        return $this;
    }

    /**
     * Get fromId
     *
     * @return integer
     */
    public function getFromId()
    {
        return $this->fromId;
    }

    /**
     * Set fromFirstName
     *
     * @param string $fromFirstName
     *
     * @return Logs
     */
    public function setFromFirstName($fromFirstName)
    {
        $this->fromFirstName = $fromFirstName;

        return $this;
    }

    /**
     * Get fromFirstName
     *
     * @return string
     */
    public function getFromFirstName()
    {
        return $this->fromFirstName;
    }

    /**
     * Set fromLastName
     *
     * @param string $fromLastName
     *
     * @return Logs
     */
    public function setFromLastName($fromLastName)
    {
        $this->fromLastName = $fromLastName;

        return $this;
    }

    /**
     * Get fromLastName
     *
     * @return string
     */
    public function getFromLastName()
    {
        return $this->fromLastName;
    }

    /**
     * Set fromUsername
     *
     * @param string $fromUsername
     *
     * @return Logs
     */
    public function setFromUsername($fromUsername)
    {
        $this->fromUsername = $fromUsername;

        return $this;
    }

    /**
     * Get fromUsername
     *
     * @return string
     */
    public function getFromUsername()
    {
        return $this->fromUsername;
    }

    /**
     * Set chatId
     *
     * @param integer $chatId
     *
     * @return Logs
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
     * Set chatFirstName
     *
     * @param string $chatFirstName
     *
     * @return Logs
     */
    public function setChatFirstName($chatFirstName)
    {
        $this->chatFirstName = $chatFirstName;

        return $this;
    }

    /**
     * Get chatFirstName
     *
     * @return string
     */
    public function getChatFirstName()
    {
        return $this->chatFirstName;
    }

    /**
     * Set chatLastName
     *
     * @param string $chatLastName
     *
     * @return Logs
     */
    public function setChatLastName($chatLastName)
    {
        $this->chatLastName = $chatLastName;

        return $this;
    }

    /**
     * Get chatLastName
     *
     * @return string
     */
    public function getChatLastName()
    {
        return $this->chatLastName;
    }

    /**
     * Set chatUsername
     *
     * @param string $chatUsername
     *
     * @return Logs
     */
    public function setChatUsername($chatUsername)
    {
        $this->chatUsername = $chatUsername;

        return $this;
    }

    /**
     * Get chatUsername
     *
     * @return string
     */
    public function getChatUsername()
    {
        return $this->chatUsername;
    }

    /**
     * Set quand
     *
     * @param integer $quand
     *
     * @return Logs
     */
    public function setQuand($quand)
    {
        $this->quand = $quand;

        return $this;
    }

    /**
     * Get quand
     *
     * @return integer
     */
    public function getQuand()
    {
        return $this->quand;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Logs
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}

