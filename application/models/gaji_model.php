<?php

  class Gaji_model extends CI_Model
  {
    public function data()
    {
        $query = $this->db->query("select * from detail_gaji");
        return $query->result();
    }
  }
?>