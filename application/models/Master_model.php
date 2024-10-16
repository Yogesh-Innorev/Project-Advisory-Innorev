<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

public function insert_master($data) {
    return $this->db->insert('MasterTable', $data);
}
}
