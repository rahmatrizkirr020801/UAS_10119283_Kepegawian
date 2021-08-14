<?php

class Gaji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gaji_model');
    }
    public function index()
    {
        $get['data'] = $this->gaji_model->data();
        $this->load->view('gaji', $get);
    }
}