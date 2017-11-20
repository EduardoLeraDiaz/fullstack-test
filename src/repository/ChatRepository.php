<?php
namespace api\repository;

use api\entity\Chat;
use api\helper\RandomMessageHelper;

class ChatRepository
{

    /**
     * @param $id1
     * @param $id2
     * @return Chat
     */
    public function getByProfileIds($id1, $id2)
    {
        //Faked get
        if (empty($_SESSION['chat'])) {
            // Fake randon message
            $chat =  new Chat('1', $id1, $id2, [RandomMessageHelper::getRandomMessage($id2)]);
            $this->save($chat);
            return $chat;
        }
        return unserialize($_SESSION['chat']);
    }

    /**
     * @param Chat $chat
     */
    public function save(Chat $chat)
    {
        // Fake save
        if (is_null($chat->getId())) {
            $chat->setId('1');
        }
        $_SESSION['chat'] = serialize($chat);
    }

}
