<?php

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pagawai_model');
    }
    public function index()
    {

            $get['data'] = $this->pagawai_model->data();
            $this->load->view('pegawai', $get);

    }
    public function view_tambah_pegawai()
    {
        $this->load->view('pegawai_tambah');
    }
    public function tambah_detai_pegawai()
    {
        $bowl['id_pegawai'] = $this->input->post('id_pegawai');
        $bowl['nama_pegawai'] = $this->input->post('nama_pegawai');
        $bowl['kd_jabatan'] =  $this->input->post('kd_jabatan');
        $bowl['alamat'] = $this->input->post('alamat');
        $bowl['no_hp'] = $this->input->post('no_hp');
        $bowl['tgl_lahir'] = $this->input->post('tgl_lahir');
        $bowl['gmail'] = $this->input->post('gmail');
        $bowl['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $bowl['password'] = $this->input->post('password');
        $bowl['status'] = "Terisi";
        $this->pagawai_model->update($bowl);
        redirect('pegawai');
    }
    public function ubah_pegawai()
    {
        $get['id_pegawai'] = $this->input->get('id_pegawai');
        $get['data'] = $this->pagawai_model->data_pegawai($get['id_pegawai']);
        $this->load->view('ubah_pegawai', $get);
    }
    public function ubah_data_pegawai()
    {
        $bowl['id_pegawai'] = $this->input->post('id_pegawai');
        $bowl['nama_pegawai'] = $this->input->post('nama_pegawai');
        $bowl['kd_jabatan'] =  $this->input->post('kd_jabatan');
        $bowl['alamat'] = $this->input->post('alamat');
        $bowl['no_hp'] = $this->input->post('no_hp');
        $bowl['tgl_lahir'] = $this->input->post('tgl_lahir');
        $bowl['gmail'] = $this->input->post('gmail');
        $bowl['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $bowl['password'] = $this->input->post('password');
        $bowl['status'] = "Terisi";
        $this->pagawai_model->updatepegawai($bowl);
        redirect('pegawai');
    }
    public function hapus_pegawai()
    {
        $bowl['id_pegawai'] = $this->input->get('id_pegawai');
        $this->pagawai_model->delete_pegawai($bowl);
        redirect('pegawai');
    }
    public function absen()
    {
        $get['id_pegawai'] = $this->input->get('id_pegawai');
        $get['data'] = $this->pagawai_model->data_nama_pegawai($get['id_pegawai']);
        $this->load->view('tambah_absen', $get);
    }
    public function tambah_absen_pegawai()
    {
        $bowl['id_pegawai'] = $this->input->post('id_pegawai');
        $data = $this->pagawai_model->data_absen($bowl['id_pegawai']);       
        $bowl['tanggal'] = $this->input->post('tanggal');
        $bowl['keterangan'] =  $this->input->post('keterangan');
        $bowl['status'] = "Terisi";
        foreach ($data as $value) {
            if ($value->id_pegawai == $this->input->post('id_pegawai') && $value->tanggal == $this->input->post('tanggal')){
                redirect('pegawai');
            } else{
                $this->pagawai_model->absenpegawai($bowl);
                redirect('pegawai'); 
            }
        }
    }
    public function gaji()
    {
        $get['id_pegawai'] = $this->input->get('id_pegawai');
        $get['data'] = $this->pagawai_model->data_nama_pegawai($get['id_pegawai']);
        $this->load->view('tambah_gaji', $get);
    }
    public function tambah_gaji_pegawai()
    {
        $bowl['id_pegawai'] = $this->input->post('id_pegawai');
        $data = $this->pagawai_model->data_gaji($bowl['id_pegawai']);       
        $bowl['tanggal_gaji'] = $this->input->post('tanggal_gaji');
        $bowl['jumlah_gaji'] =  $this->input->post('jumlah_gaji');
        $bowl['status'] = "Terisi";
        foreach ($data as $value) {
            if ($value->id_pegawai == $this->input->post('id_pegawai') && $value->tanggal_gaji == $this->input->post('tanggal_gaji')){
                redirect('pegawai');
            } else{
                $this->pagawai_model->gajipegawai($bowl);
                redirect('pegawai'); 
            }
        }
    }


}
?>