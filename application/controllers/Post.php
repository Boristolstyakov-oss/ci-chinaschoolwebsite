<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/25
 * Time: 15:19
 */
class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Reply_model');
        $this->load->model('Member_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function post($post_id)
    {
        $post['post_id'] = $post_id;
        $post['schoolname'] = $this->Reply_model->get_school($post_id);
        $post['schoolname'] = $post['schoolname'][0]['SchoolName'];
        $post['main'] = $this->Reply_model->get_post($post_id);
        $post['main'] = $post['main'][0];
        $post['reply'] = $this->Reply_model->get_reply($post_id);
        $post['usr']['pic'] = '';
        $post['usr']['username'] = '';

        if (!(isset($_COOKIE['islog']) && $_COOKIE['islog'] == 1))
        {
            $post['log'] = '登录';
        }else{
            $post['log'] = '退出';
            $post['usr'] = $this->Member_model->get_info($_COOKIE['name']);
            $post['usr'] = $post['usr'][0];
            $this->form_validation->set_rules('content', 'content', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $post['statue'] = 0;
            }else{
                $post['statue'] = 1;
                $this->Reply_model->set_reply($post_id, $post['usr']['username'], $post['usr']['pic']);
                $post['post_id'] = $post_id;
                header("Location:./".$post_id.".php");
            }
        }


//        $domain = base_url();
        setcookie('url_p', uri_string(), time()+60*60, '/');
        $this->load->view('templete/forum/header',$post);
        $this->load->view('post/index',$post);
        $this->load->view('templete/forum/footer');

//        var_dump($post);
    }
}