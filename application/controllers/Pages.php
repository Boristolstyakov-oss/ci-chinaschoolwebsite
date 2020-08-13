<?php
/**
* 
*/
class Pages extends CI_Controller
{	
	public function view($page = "home")
	{
		if (!file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
			show_404();
		}
		$this->load->helper('url');
		$this->load->view('templete/home/header');
		$this->load->view('pages/'.$page);
		$this->load->view('templete/home/footer');
	}
}
