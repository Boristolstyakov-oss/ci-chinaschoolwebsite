<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/22
 * Time: 20:21
 */
class Forum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Forum_model');
        $this->load->helper('url_helper');
        $this->load->model('Member_model');
    }

    public function forum($school_id)
    {
        $post['post'] = $this->Forum_model->forum($school_id);
        if ($post['post'] == 1) show_404();
        $post['statue'] = NULL;
        $post['school_id'] = $school_id;
        $post['schoolname'] = $post['post']['schoolname'];
        unset($post['post']['schoolname']);
        $post['schoolprovince'] = $post['post']['schoolProvince'];
        unset($post['post']['schoolProvince']);
        $post['provinceid'] = $post['post']['provinceid'];
        unset($post['post']['provinceid']);

        if(!(isset($_COOKIE['islog'])&&$_COOKIE['islog']==1))
        {
            $post['statue'] = "请登陆!";
            $post['log'] = "登录";
            $post['usr']['pic'] = '';
            $post['usr']['username'] = 'Username';
        }else{
            $post['log'] = "退出";

            $post['usr'] = $this->Member_model->get_info($_COOKIE['name']);
            $post['usr'] = $post['usr'][0];

            $this->form_validation->set_rules('post_title', 'Title', 'required');
            $this->form_validation->set_rules('text_area', 'Content', 'required');

            if ($this->form_validation->run() === FALSE)
            {

            } else {
                $this->Forum_model->create_post($school_id, $post['usr']['username'], $post['usr']['pic']);
                $post['school_id'] = $school_id;
//                $post['statue'] = "发帖成功！";
                header("Location:./".$school_id.".php");

            }
        }

        setcookie('url_p', uri_string(), time()+60*60, '/');
        $this->load->view('templete/forum/header',$post);
        $this->load->view('forum/index', $post);
        $this->load->view('templete/forum/footer');

//        var_dump($post);
    }

}
