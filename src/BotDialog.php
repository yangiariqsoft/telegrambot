<?php

namespace Yangiariqsoft\Telegrambot;


class BotDialog
{
    private $controller;
    private $action;
    private $status;
    private $data;

    public static function getInstance($userId){
        session_id('dialog' . $userId);
        session_start();

        if (isset($_SESSION['botdialog'])){
            return $_SESSION['botdialog'];
        }

        $botdialog = new BotDialog();
        $_SESSION['botdialog'] = $botdialog;
        return $botdialog;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}