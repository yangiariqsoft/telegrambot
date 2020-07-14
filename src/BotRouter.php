<?php

namespace Yangiariqsoft\Telegrambot;

use TelegramBot\Api\BotApi;

class BotRouter
{
    protected $defaultController = DefaultBotController::class;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getDefaultController()
    {
        return $this->defaultController;
    }

    /**
     * @param mixed $defaultController
     */
    public function setDefaultController($defaultController)
    {
        $this->defaultController = $defaultController;
    }

    public function route($dialog, $data){
        $api = new BotApi($this->token);
        $controllerClass = $dialog->getController();
        $controller = null;
        if (class_exists($controllerClass)){
            $controller = new $controllerClass();
        }elseif (class_exists($this->defaultController)){
            $controller = new $this->defaultController();
        }
        if ($controller instanceof BotController){
            $controller->setApi($api);
            $controller->run($dialog, $data);
        }
    }
}