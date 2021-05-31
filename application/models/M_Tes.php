<?php

class M_Tes extends CI_Model {

    public function check_update() {

        $this->db->insert('tes', array('id' => rand(111,999), 'nama' => 'Ucok'));
        return $this->db->affected_rows();
    }
}