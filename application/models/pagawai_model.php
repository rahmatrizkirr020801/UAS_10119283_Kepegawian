<?php

  class pagawai_model extends CI_Model
  {
      public function data()
      {
          $query = $this->db->query("select * from tabel_pegawai");
          return $query->result();
      }
      public function data_count_pegawai()
      {
          $query = $this->db->query("SELECT id_pegawai FROM `tabel_pegawai`");
          return $query->result();
      }
      public function data_jabatan($id)
      {
          $query = $this->db->query("select p.nama_pegawai, j.nama_jabatan, j.gaji from tabel_pegawai p inner join tabel_jabatan j on j.kd_jabatan=p.kd_jabatan where p.id_pegawai=". $id);
          return $query->result();
      }
      public function update($bowl)
      {
          $this->db->query("insert into tabel_pegawai(id_pegawai, nama_pegawai, kd_jabatan, alamat, no_hp, tgl_lahir, gmail, jenis_kelamin, password) values('".$bowl['id_pegawai']."','".$bowl['nama_pegawai']."','".$bowl['kd_jabatan']."','".$bowl['alamat']."','".$bowl['no_hp']."','".$bowl['tgl_lahir']."','".$bowl['gmail']."','".$bowl['jenis_kelamin']."','".$bowl['password']."');");
          $insert_id = $this->db->insert_id();
          return $insert_id;
      }
      public function data_pegawai($id_pegawai)
      {
          $query = $this->db->query("SELECT * FROM `tabel_pegawai` WHERE id_pegawai =". $id_pegawai);
          return $query->result();
      }
      public function updatepegawai($bowl)
      {
          $this->db->query("update tabel_pegawai set nama_pegawai='".$bowl['nama_pegawai']."',kd_jabatan='".$bowl['kd_jabatan']."',alamat='".$bowl['alamat']."',no_hp='".$bowl['no_hp']."',tgl_lahir='".$bowl['tgl_lahir']."',gmail='".$bowl['gmail']."',jenis_kelamin='".$bowl['jenis_kelamin']."',password='".$bowl['password']."' where id_pegawai='".$bowl['id_pegawai']."'");
          $insert_id = $this->db->insert_id();
          return $insert_id;
      }
      public function delete_pegawai($bowl)
      {
        $this->db->where('id_pegawai', $bowl['id_pegawai']);
        $this->db->delete('tabel_pegawai');
      }
      public function data_nama_pegawai($id_pegawai)
      {
          $query = $this->db->query("SELECT id_pegawai, nama_pegawai, kd_jabatan FROM `tabel_pegawai` WHERE id_pegawai=". $id_pegawai);
          return $query->result();
      }
      public function absenpegawai($bowl)
      {
          $this->db->query("insert into tabel_absen(id_pegawai, tanggal, keterangan) values('".$bowl['id_pegawai']."','".$bowl['tanggal']."','".$bowl['keterangan']."');");
          $insert_id = $this->db->insert_id();
          return $insert_id;
      }
      public function data_absen($id_pegawai)
      {
          $query = $this->db->query("SELECT id_pegawai, tanggal FROM `tabel_absen` WHERE id_pegawai=". $id_pegawai);
          return $query->result();
      }
      public function data_gaji($id_pegawai)
      {
          $query = $this->db->query("SELECT id_pegawai, tanggal_gaji FROM `detail_gaji` WHERE id_pegawai=". $id_pegawai);
          return $query->result();
      }
      public function gajipegawai($bowl)
      {
          $this->db->query("insert into detail_gaji(id_pegawai, tanggal_gaji, jumlah_gaji) values('".$bowl['id_pegawai']."','".$bowl['tanggal_gaji']."','".$bowl['jumlah_gaji']."');");
          $insert_id = $this->db->insert_id();
          return $insert_id;
      }
      public function id_jabatan($nama_jabatan)
      {
          $query = $this->db->query("select kd_jabatan from tabel_jabatan where nama_jabatan=".$nama_jabatan);
          return $query->result();
      }
      public function pegawai_berdasarkan_jabatan($bowl)
      {
          $query = $this->db->query("SELECT * FROM `tabel_pegawai` WHERE kd_jabatan =".$bowl);
          return $query->result();
      }
      
  }
