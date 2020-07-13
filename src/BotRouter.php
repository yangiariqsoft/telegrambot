<?php

namespace Yangiariqsoft\Telegrambot;

use TelegramBot\Api\BotApi;

class BotRouter extends Config
{
    protected $defaultController = DefaultBotController::class;

    public function __construct($token)
    {
        $this->token = $token;
        $this->api = new BotApi($this->token);
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
        $controllerClass = $dialog->getController();
        if (class_exists($controllerClass)){
            $controller = new $controllerClass();
            if ($controller instanceof BotController){
                $controller->setToken($this->token);
                $controller->setApi($this->api);
                $controller->run($dialog, $data);
            }
        }elseif (class_exists($this->defaultController)){
            $controller = new $this->defaultController();
            if ($controller instanceof BotController){
                $controller->setToken($this->token);
                $controller->setApi($this->api);
                $controller->run($dialog, $data);
            }
        }
    }
}