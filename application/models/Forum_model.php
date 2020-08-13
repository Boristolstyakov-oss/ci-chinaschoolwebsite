<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/22
 * Time: 20:25
 */
class Forum_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function forum($school_id = 0)
    {
        if($school_id == 0) show_404();
        $sql = "select * from forum_post where post_school = \"".$school_id."\"";
        $query = $this->db->query($sql);
        $post = $query->result_array();
//        if (empty($post)) return 1;
        $sql = "select SchoolName, School_Province from schoolinfo where id = \"".$school_id."\"";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        if (empty($query)) return 1;
        $post['schoolname'] = $query[0]['SchoolName'];
//        if ($post['schoolname'] == NULL) return 1;
        $post['schoolProvince'] = $query[0]['School_Province'];
        $sql = "select provinceid from province where province = \"".$post['schoolProvince']."\"";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        $post['provinceid'] = $query[0]['provinceid'];
        return $post;
    }

    public function create_post($school_id = 0, $name, $pic)
    {
        if ($school_id == 0) show_404();
        $data = array(
            'post_title' => $this->input->post('post_title'),
            'post_content' => $this->input->post('text_area'),
            'post_school' => $school_id,
            'post_date' => date("Y-m-d H:i:s"),
            'post_from' => $name,
            'post_pic' => $pic
        );
        $this->db->insert('forum_post', $data);
    }

}
