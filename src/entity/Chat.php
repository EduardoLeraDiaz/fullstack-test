<?php
namespace api\entity;

class Chat {

    private $id;
    private $profile1;
    private $profile2;
    private $messages = [];

    /**
     * Chat constructor.
     * @param $id
     * @param $profile1
     * @param $profile2
     * @param array $messages
     */
    public function __construct($id = null, $profile1, $profile2, array $messages=[])
    {
        $this->id = $id;
        $this->profile1 = $profile1;
        $this->profile2 = $profile2;
        $this->messages = $messages;
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
    public function getProfile1()
    {
        return $this->profile1;
    }

    /**
     * @param mixed $profile1
     */
    public function setProfile1($profile1)
    {
        $this->profile1 = $profile1;
    }

    /**
     * @return mixed
     */
    public function getProfile2()
    {
        return $this->profile2;
    }

    /**
     * @param mixed $profile2
     */
    public function setProfile2($profile2)
    {
        $this->profile2 = $profile2;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param Message $message
     * @return array
     */
    public function addMessages(Message $message)
    {
        $this->messages[] = $message;
        return $this->messages;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $messages = [];
        foreach ($this->getMessages() as $message) {
            $messages[] = $message->toArray();
        }
        return [
            'id' => $this->id,
            'profile1' => $this->profile1,
            'profile2' => $this->profile2,
            'messages' => $messages
        ];
    }
}