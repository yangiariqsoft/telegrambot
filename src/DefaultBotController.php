<?php

namespace Yangiariqsoft\Telegrambot;

use Yangiariqsoft\Telegrambot\BotController;

class DefaultBotController extends BotController
{

    public function defaultAction($dialog, $data)
    {
        if (is_array($data) && isset($data['message']['chat']['id'])){
            $this->api->sendMessage($data['message']['chat']['id'], 'Welcome our bot!');
        }
    }
}