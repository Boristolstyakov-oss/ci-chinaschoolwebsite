<?php
/**
* 
*/
class School_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_content($school = "NULL")
	{
		if ($school == "NULL")
		{
			show_404();
		}
		$sql = "SELECT * FROM schoolinfo WHERE id = \"".$school."\"";
		$query = $this->db->query($sql);
		$data = $query->result_array();

        $province = $data[0]["School_Province"];
        $sql = "SELECT provinceid FROM province WHERE province = \"".$province."\"";
        $query = $this->db->query($sql);
        $data['province'] = $query->result_array();
        return $data;
	}

	
}
