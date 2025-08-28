<?php

require_once '../models/Message.php';
require_once '../dto/MessageDTO.php';


class MessageController
{

    private $messageModel;

    public function __construct($messageObj)
    {
        $this->messageModel = new Message($messageObj);
    }

    public function getMessages()
    {
        $messagesData = $this->messageModel->getAllMessages();
        $msgObj = null;
        $msgDTO = [];

        foreach ($messagesData as $msg) {
            $msgObj = new MessageDTO();
            $msgObj->setId($msg["id"]);
            $msgObj->setName($msg["name"]);
            $msgObj->setEmail($msg["email"]);
            $msgObj->setMessage($msg["message"]);

            $msgDTO[] = $msgObj;
        }

        return $msgDTO;

    }

    public function sendMessage()
    {
        $sendMessage = $this->messageModel->addMessage();

        if (!$sendMessage) {
            return False;
        }

        return True;
    }

}