<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_model extends CI_Model {

	public function validateLogin($data){
		$this->db->select('*');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$this->db->from('admin');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->row();
		}
		else{
			return false;
		}
	}
}