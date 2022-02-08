<?php
session_start();

abstract class C_Controller
{
    abstract protected function render();

    abstract protected function before();

    public function Request($action)
    {
        $this->before();
        $this->$action();
        $this->render();
    }

    protected function IsGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected function IsPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    protected function Template($fileName, $vars = [])
    {
        foreach ($vars as $k => $v) {
            $$k = $v;
        }

        ob_start();
        include "$fileName";
        return ob_get_clean();
    }

    public function __call($name, $params)
    {
        die('Error');
    }
}
