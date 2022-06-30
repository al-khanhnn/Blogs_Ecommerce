<?php
class Product extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detailProduct()
    {
        echo 'detail product';
    }
}
