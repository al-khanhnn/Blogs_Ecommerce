<?php
class HomeModel extends ParentModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function category()
    {
        $result = $this->database->select('category_product');
        return $result;
    }
}
