<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

	
	public function countUserAktif()
	{

		$query = $this->db->query(
			"SELECT COUNT(id_user) as jml_user
                               FROM mst_user"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->jml_user;
		} else {
			return 0;
		}
	}


	public function countAllUser()
	{
		$query = $this->db->query(
			"SELECT COUNT(id_user) as count_all
                               FROM mst_user"
		);
		if ($query->num_rows() > 0) {
			return $query->row()->count_all;
		} else {
			return 0;
		}
	}

	public function getAllUser()
	{
		$query = "SELECT * 
                  FROM mst_user";
		return $this->db->query($query)->result_array();
	}

	public function getAllmember()
	{
		$query = "SELECT * 
                  FROM mst_member";
		return $this->db->query($query)->result_array();
	}


	

	
}
