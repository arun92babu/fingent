<?php

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
	function read_user_by_uname($uname='')
	{
		$this->db->select();
		$this->db->join('user_types','login.userTypeID = user_types.user_typeID');
		$this->db->where('username', $uname);
		$this->db->where('login.status', 1);
        $query = $this->db->get('login');
        return $query->row_array();
	}
}