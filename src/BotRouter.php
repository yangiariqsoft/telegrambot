<?php

namespace Yangiariqsoft\Telegrambot;

use Yangiariqsoft\Telegrambot\BotController;

class BotRouter
{
    private $defaultController;

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
                $controller->run($dialog, $data);
            }
        }elseif (class_exists($this->defaultController)){
            $controller = new $this->defaultController();
            if ($controller instanceof BotController){
                $controller->run($dialog, $data);
            }
        }
    }


}