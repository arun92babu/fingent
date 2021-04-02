<?php

class Dashboard_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		date_default_timezone_set("Asia/Calcutta");
	}
	function get_employee()
	{
		$this->db->select("employee.*,department.*,TIMESTAMPDIFF(YEAR,employee.employee_dob,NOW()) AS age,TIMESTAMPDIFF(YEAR,employee.	employee_doj,NOW()) AS exyear");
		$this->db->join('department','employee.departmentID = department.departmentID');
		$this->db->where('employee.status', 1);
        $query = $this->db->get('employee');
        return $query->result_array();
	}
	function insert($table='',$data=[])
	{
		$this->db->insert($table,$data);
		return ($this->db->insert_id())?$this->db->insert_id():FALSE;
	}
}