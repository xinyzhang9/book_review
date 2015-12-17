<?php  
/**
* 
*/
class User extends CI_Model
{
	public function get_all_user(){
		return $this->db->query("SELECT * FROM users ORDER BY created_at ASC")->result_array();
	}

	public function add_user($user){
		$query = "INSERT INTO users (name,alias,email,password,created_at) VALUES(?,?,?,?,NOW())";
		$values = array($user['name'],$user['alias'],$user['email'],$user['password']);
		return $this->db->query($query,$values);
	}

	public function remove_user($id){
		$query = "DELETE FROM users where id = $id";
		return $this->db->query($query);
	}

	public function get_user_by_id($id){
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }

    public function get_user_by_email($email){
    	return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

    public function get_user_total_reviews($id){
        $query = "SELECT users.id as id, count(reviews.id) as total_reviews from users
                    left join reviews on reviews.user_id = users.id
                    left join books on reviews.book_id = books.id
                    where users.id = ?
                    group by users.id";
        $values = array($id);
        return $this->db->query($query,$values)->row_array();
    }

    public function get_user_review_books($id){
        $query = "SELECT users.id as id,books.title as title,
                books.id as book_id 
                from users
                left join reviews on reviews.user_id = users.id
                left join books on reviews.book_id = books.id
                where users.id = ?
                group by books.title";
        $values = array($id);
        return $this->db->query($query,$values)->result_array();

    }


}
?>