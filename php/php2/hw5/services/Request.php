<?php
namespace App\services;


class Request
{

    private $requestString;
    private $controllerName;
    private $actionName;
    private $id;
    private $params;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
    }

    private function parseRequest()
    {
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";

        if (preg_match_all($pattern,$this->requestString,$matches))
        {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];

            $this->params = [
                'get' => $_GET,
                'post' => $_POST,
            ];

            $this->id = (int)$_GET['id'];
        }
    }
    /**
     * @return mixed
     */
    public function getRequestString()
    {
        return $this->requestString;
    }

    /**
     * @param mixed $requestString
     */
    public function setRequestString($requestString): void
    {
        $this->requestString = $requestString;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @param mixed $controllerName
     */
    public function setControllerName($controllerName): void
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @param mixed $actionName
     */
    public function setActionName($actionName): void
    {
        $this->actionName = $actionName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }



}