<?php

class DB{
    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connecting();
    }

    public function connecting()
    {
        return mysqli_connect('localhost', 'root', 'root', 'les6');
    }
}

?>