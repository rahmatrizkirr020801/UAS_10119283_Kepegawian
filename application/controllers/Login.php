<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index()
    {
        $this->load->view('login');
    }
    public function login_check()
    {
        $data = array('id_pegawai' => $this->input->post('id_pegawai', true), 'password' => $this->input->post('password', true));
        $res = $this->login_model->login_datacheck($data);

        if ($res->num_rows() == 1) {
            foreach ($res->result() as $value) {
                // var_dump($value);
                $valuedata['logged_in'] = 'Sudah login';
                $valuedata['id_pegawai'] = $value->id_pegawai;
                $valuedata['nama_pegawai'] = $value->nama_pegawai;
                $this->session->set_userdata($valuedata);
            }
            redirect('home');
        } else {
            echo "Login Failed";
        }
    }
    public function logout()
    {
        session_destroy();
        redirect('login');
    }
}
