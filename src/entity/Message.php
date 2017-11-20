<?php
namespace api\entity;

class Message {
    private $id;
    private $datetime;
    private $message;
    private $sender;

    /**
     * Message constructor.
     * @param $id
     * @param $datetime
     * @param $message
     * @param $sender
     */
    public function __construct($id=null, $datetime, $message, $sender)
    {
        $this->id = $id;
        $this->datetime = $datetime;
        $this->message = $message;
        $this->sender = $sender;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'datetime' => $this->datetime,
            'message' => $this->message,
            'sender' => $this->sender
        ];
    }
}