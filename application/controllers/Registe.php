<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 2016/10/8
 * Time: 18:21
 */
class Registe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Registe_model');
        $this->load->helper('url_helper');
    }

    public  function index()
    {
        $data = NULL;
        $data['error'] = '';
        $data['notice'] = '';
        //表单验证
        $this->form_validation->set_rules('name', 'UserName', 'required|is_unique[member.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('code', 'CheckCode', 'required');

        $this->form_validation->set_message('is_unique', 'This name has been registed.');

        if(!$this->form_validation->run() === FALSE)
        {
            $name = $this->input->post('name');
            //上传图片处理
            $config['upload_path'] = './pic/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 100;
            $config['max_width'] = 720;
            $config['max_height'] = 720;
            $config['file_name'] = $name;
            $this->load->library('upload', $config);


            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $data['error'] = $error;
            }
            else
            {
                $date = array('upload_data' => $this->upload->data());
                $data['upload_data'] = $date['upload_data'];
                $num = $this->Registe_model->registe();
                if($num == 0)
                {
                    setcookie("name", $this->input->post('name'), time()+60*60, '/');
                    setcookie('islog', 1, time()+60*60, '/');
                    if (isset($_COOKIE['url_p'])) header("Location:../../".$_COOKIE['url_p'].".html");
                    else header("Location:../../");
                }else $data['notice']="验证码错误";

            }
        }

        $this->load->view('registe/index',$data);
//        var_dump($data);
    }
}