<?php  
/**
* 
*/
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		// $this->load->model('User');
		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('index');
	}

}
?>