<?php
/**
* 
*/
class Location_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_school($loc = 'all',$page = 1)
	{
		if ($loc == 'all') {
			// $query = $this->db->get('schoolinfo');
			show_404();
		}else{
			$sql = "SELECT province FROM province WHERE provinceid = \"".$loc."\"";
			$query = $this->db->query($sql);
			$loc = $query->result();
            $page = ($page - 1) *8;
			$sql = "SELECT * FROM schoolinfo WHERE school_province = \"".$loc[0]->province."\" LIMIT 8 OFFSET $page";
			$query = $this->db->query($sql);
            $post = $query->result_array();
            $sql = "Select * FROM schoolinfo WHERE school_province = \"".$loc[0]->province."\"";
            $query = $this->db->query($sql);
            $post['num'] = $query->result_array();
            $post['num'] = count($post['num']);
		}
		return $post;
	}

	public function get_school_byLoc($loc = 'null',$num = 20)
	{
		$sql = "SELECT schoolname, id FROM schoolinfo WHERE school_province = \"".$loc."\" LIMIT $num";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
