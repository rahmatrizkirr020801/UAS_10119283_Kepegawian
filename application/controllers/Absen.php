<?php

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_model');
    }
    public function index()
    {
        $get['data'] = $this->absen_model->data();
        $this->load->view('absen', $get);
    }
}