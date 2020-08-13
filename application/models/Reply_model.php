<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/24
 * Time: 15:23
 */
class Reply_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_school($post_id)
    {
        if($post_id == 0) show_404();
        $sql = "select post_school from forum_post where post_id = \"".$post_id."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
        $sql = "select SchoolName from  schoolinfo where ID = \"".$post[0]['post_school']."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
        return $post;
    }

    public function get_post($post_id)
    {
        if($post_id == 0) show_404();
        $sql = "select * from forum_post where post_id = \"".$post_id."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
        return $post;
    }

    public function get_reply($post_id)
    {
        if($post_id == 0) show_404();
        $sql = "select * from forum_reply where reply_post = \"".$post_id."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
        return $post;
    }

    public function set_reply($post_id, $name, $img)
    {
        if($post_id == 0) show_404();
        $data = array(
            'reply_content' => $this->input->post('content'),
            'reply_post' => $post_id,
            'reply_date' => date("Y-m-d H:i:s"),
            'reply_from' =>$name,
            'reply_pic' => $img
        );
        $this->db->insert('forum_reply', $data);
    }
}