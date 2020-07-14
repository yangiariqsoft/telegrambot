<?php

namespace Yangiariqsoft\Telegrambot;

abstract class BotController
{
    protected $api;

    /**
     * @return mixed
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @param mixed $api
     */
    public function setApi($api): void
    {
        $this->api = $api;
    }

    public function run($dialog, $data){
        $controller = $dialog->getController();
        $action = $dialog->getAction();
        if ($action == null || $action == 'default'){
            $this->defaultAction($dialog, $data);
        }else{
            $action .= 'Action';
            if (method_exists($this, $action)){
                $this->$action($dialog, $data);
            }
        }
    }

    public abstract function defaultAction($dialog, $data);
}