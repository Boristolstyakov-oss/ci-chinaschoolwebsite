<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/27
 * Time: 20:14
 */
class Member_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_info($username)
    {
        $sql = "SELECT * FROM member WHERE username = \"".$username."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
        return $post;
    }
}