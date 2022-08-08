<?php

class Index extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->homePage();
    }

    public function homePage()
    {
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }

    public function notFound(){
        $this->load->view('header');
        $this->load->view('404');
        $this->load->view('footer');
    }
}
