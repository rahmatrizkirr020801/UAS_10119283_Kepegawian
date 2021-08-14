<?php

  class Login_model extends CI_Model
  {
      public function login_datacheck($data)
      {
          $query = $this->db->get_where('tabel_pegawai', $data);
          return $query;
      }
  }
