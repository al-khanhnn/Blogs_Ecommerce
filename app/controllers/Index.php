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
        $homeModel = $this->load->model('HomeModel');
        $data['categories'] = $homeModel->category();
        $this->load->view('home',$data);
        $this->load->view('footer');
    }
}
