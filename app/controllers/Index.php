<?php

class Index extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function homePage()
    {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
