<?php
namespace api\helper;

use api\entity\Message;

class RandomMessageHelper {
    private static $randomMessages= [
        'Hello',
        'Hallo',
        'Hola',
        'Alo'
    ];

    public static function getRandomMessage($id1) {
        return new Message('1',time(),self::$randomMessages[rand(0,3)],$id1);
    }

}