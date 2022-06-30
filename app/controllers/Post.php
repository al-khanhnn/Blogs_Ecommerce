<?php
class Post extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detailPost()
    {
        echo 'detail post';
    }
}
