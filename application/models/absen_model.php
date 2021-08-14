<?php

  class Absen_model extends CI_Model
  {
    public function data()
    {
        $query = $this->db->query("select * from tabel_absen");
        return $query->result();
    }
  }
?>