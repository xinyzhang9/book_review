<?php  
/**
* 
*/
class Books extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('User');
		$this->load->model('Book');

		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('new');
	}


	public function add_book($user_id){
		$book = array('title'=>$this->input->post('title'),
			'author'=> $this->input->post('author'));
		$this->Book->add_book($book);
		//retrieve book_id
		$book_info = $this->Book->get_book($book['title']);
		//add review if it's not null
		if(!empty($this->input->post('review'))){
			$review = array('review'=>$this->input->post('review'),
					'rating'=>$this->input->post('rating'),
					'user_id'=>$user_id,
					'book_id'=>$book_info['id']);
			$this->Book->add_review($review);
		}
		
		redirect('/login/profile');
		
	}

	public function add_review($user_id,$book_id){
		$review = array('review'=>$this->input->post('review'),
			'rating'=> $this->input->post('rating'),
			'user_id'=>$user_id,
			'book_id'=>$book_id);
		$this->Book->add_review($review);
		redirect('/login/profile');
	}

	//show book info with id
	public function show($id){
		$book = $this->Book->get_book_by_id($id);
		$title = $book['title'];
		$book = $this->Book->get_book($title);
		$reviews = $this->Book->get_review_by_title($title);
		$data = array('book'=>$book,
						'reviews'=>$reviews
					);
		$this->load->view('show',$data);
	}

	public function delete_review($id){
		$this->Book->delete_review($id);
		redirect('/login/profile');
	}

	public function show_user($id){
		$user = $this->User->get_user_by_id($id);
		$user_review_info = $this->User->get_user_total_reviews($id);
		$user_review_book_info = $this->User->get_user_review_books($id);
		$data = array('user_review_info'=>$user_review_info,
						'user_review_book_info'=>$user_review_book_info,
						'user'=>$user);
		$this->load->view('user_profile',$data);

	}
	


	

}
?>