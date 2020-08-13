<?php
/**
*
*/
class School extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('location_model');
		$this->load->model('school_model');
		$this->load->helper('url_helper');
		// $this->output->cache(60);
	}

	public function index()
	{
		$data['schools'][0]['SchoolName'] = "JIT";
		$this->load->view('templete/content/header',$data);
		echo "hello";
		$this->load->view('templete/content/footer');
	}

	public function view($school = "NULL")
	{
		if ($school == "NULL") {
			show_404();
		}
		$data['schools'] = $this->school_model->get_content($school);
        $data['province_id'] = $data['schools']['province']['0']['provinceid'];
        unset($data['schools']['province']);
		if (empty($data['schools'])) {
			show_404();
		}
		$data['list']=$this->location_model->get_school_byLoc($data['schools']['0']['School_Province'],15);
		$this->load->helper('url');
		// $this->output->enable_profiler(TRUE);
		$this->load->view('templete/content/header',$data);
		$this->load->view('schools/school_page',$data);
		$this->load->view('templete/content/footer',$data);
//        var_dump($data);
	}

}
