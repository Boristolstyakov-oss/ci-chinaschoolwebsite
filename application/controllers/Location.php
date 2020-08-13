<?php
/**
*
*/
class Location extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('location_model');
		$this->load->helper('url_helper');
		// $this->output->cache(60);
	}

	public function index()
	{
		$data['schools'] = $this->location_model->get_school("all",1);

		$this->load->view('templete/page/header',$data);
		$this->load->view('schools/index',$data);
		$this->load->view('templete/page/footer');
	}

	public function view($loc = 'all',$page = 1)
	{
		$data['schools'] = $this->location_model->get_school($loc,$page);
        if (sizeof($data['schools']) == 1) show_404();
        $data['loc'] = $loc;
        $total = $data['schools']['num'];
        unset($data['schools']['num']);
        $page_num = ceil($total/8);
        for ($i = 1; $i<=$page_num; ++$i)
        {
            $data['page'][$i] = $i;
        }
        $data['page_p'] = $page == 1?1:$page-1;
        $data['page_n'] = $page == $page_num?$page_num:$page+1;


		$this->load->view('templete/page/header',$data);
		$this->load->view('schools/index',$data);
		$this->load->view('templete/page/footer');
        // var_dump($data);
	}
}
