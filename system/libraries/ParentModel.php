<?php

class ParentModel
{
    protected $database = array();

    public function __construct()
    {
        $connect = 'mysql:dbname=blogs_ecommerce; host=localhost';
        $user = 'root';
        $password = '';
        $this->database = new Database($connect, $user, $password);
    }
}
