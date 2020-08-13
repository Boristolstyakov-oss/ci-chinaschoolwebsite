<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/10/8
 * Time: 18:35
 */
class registe_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function registe()
    {   $code = $this->input->post('code');
        if($code == $_SESSION['code'])
        {
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $pic = "../../pic/".$name.'.jpg';
            $data = array(
                'username' => $name,
                'password' => $password,
                'pic' => $pic,
            );
            $this->db->insert('member', $data);
            return 0;
        }else return 1;

    }
}