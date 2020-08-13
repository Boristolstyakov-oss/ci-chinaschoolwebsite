<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/9/27
 * Time: 10:52
 */
class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Log_model');
        $this->load->helper('url_helper');
    }

    public function log()
    {
        if (isset($_COOKIE['islog']) && $_COOKIE['islog'] == 1)
        {
            setcookie('islog', 0, time()-1);
            setcookie('name', 0, time()-1);
            header("Location:./".$_COOKIE['url_p'].".html");
        }


        $this->form_validation->set_rules('name', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('code', 'CheckCode', 'required');

        $post = NULL;
        $post['notice'] = '';
        if (!$this->form_validation->run() === FALSE)
        {
            $post['notice'] = $this->Log_model->Check_log();
            if ($post['notice'] == 0) $post['notice'] = "验证码错误";
            elseif ($post['notice'] == 1) $post['notice'] = "用户名错误";
            elseif ($post['notice'] == 2) $post['notice'] = "密码错误";
        }
        if ($post['notice'] == 3)
        {
            $post['notice'] = '';
            setcookie("name", $this->input->post('name'), time()+60*60, '/');
            setcookie('islog', 1, time()+60*60, '/');
            if (isset($_COOKIE['url_p'])) header("Location:./".$_COOKIE['url_p'].".html");
            else header("Location:./".base_url());
        }

        $this->load->view('log/index',$post);
//        var_dump($post);
    }
}