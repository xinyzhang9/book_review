<?php  
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('User');
		$this->load->model('Book');
		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('index');
	}

	public function register(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name","name","trim|required");
		$this->form_validation->set_rules("alias","alias","trim|required");
		$this->form_validation->set_rules("email","email","trim|required|valid_email");
		$this->form_validation->set_rules("password","Password","required|min_length[8]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","required|matches[password]");

		$name = $this->input->post('name');
		$alias = $this->input->post('alias');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');

		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$user = array('name' =>$name,
			 				'alias' =>$alias,
			 				'email' =>$email,
			 				'password' =>md5($password)
			 				);
			$this->load->model('User');
			$this->User->add_user($user);//register user
			redirect('/login/profile');
		}

	}

	public function log_in(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("login_email","email","required|valid_email");
		$this->form_validation->set_rules("login_password","Password","required");

		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$email = $this->input->post('login_email');
			$password = $this->input->post('login_password');
			$this->load->model('User');
			$db_user = $this->User->get_user_by_email($email);
			if(md5($password) == $db_user['password']){
				$isLoggedIn = true;
				$user = array('id'=>$db_user['id'],
								'name'=>$db_user['name'],
								'alias'=>$db_user['alias'],
								'email'=>$db_user['email'],
								'isLoggedIn'=>$isLoggedIn);
				//put into session
				$this->session->set_userdata($user);
				redirect("/login/profile");
			}else{
				if (isset($this->view_data["errors"])) {
					$this->view_data["errors"].="<p>email and password don't match.</p>";
				}else{
					$this->view_data = array('errors' => "<p>email and password don't match.</p>");
				}
				$this->load->view('index',$this->view_data);
			}
		}
	}
	public function profile(){
		if($this->session->userdata('isLoggedIn')===true){
			$user = $this->User->get_user_by_id($this->session->userdata('id'));
			$reviews = $this->Book->get_recent_review();
			$book_with_reviews = $this->Book->get_book_with_reviews();
			$data = array('reviews'=>$reviews,
							'user'=>$user,
							'book_with_reviews'=>$book_with_reviews);
			$this->load->view('welcome',$data);	
		}else{
			redirect('/');
		}
	}
	public function log_off(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
?>