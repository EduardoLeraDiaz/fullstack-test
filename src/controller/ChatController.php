<?php

namespace api\controller;

use api\entity\Message;
use api\repository\ChatRepository;
use api\entity\Chat;

class ChatController
{

    /**
     * @param $id1
     * @param $id2
     * @return array
     */
    public function get($id1, $id2) {
        $repository = new ChatRepository();
        $chat = $repository->getByProfileIds($id1,$id2);
        if (is_null($chat)) {
            $chat = new Chat(null, $id1, $id2);
        }

        return $chat->toArray();
    }

    /**
     * @param $id1
     * @param $id2
     * @return array
     */
    public function addMessage($id1, $id2) {
        $repository = new ChatRepository();
        $chat = $repository->getByProfileIds($id1,$id2);
        // Super global $_POST should no be used directly without filter for avoid security problems.
        $message = new Message(null, time(), $_POST['message'], $id1);
        $chat->addMessages($message);
        $repository->save($chat);
        return $chat->toArray();
    }
}