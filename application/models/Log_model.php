<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/27
 * Time: 11:13
 */
class Log_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function Check_log()
    {
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $code = $this->input->post('code');
        if ($code == $_SESSION['code'])
        {
            $sql = "SELECT password FROM member WHERE username = \"".$name."\"";
            $query = $this->db->query($sql);
            $post = $query->result_array();
            if (empty($post)) return 1;
            else {
                if($post[0]['password'] == $password) return 3;
                else return 2;
            }
        } else return 0;
    }

}