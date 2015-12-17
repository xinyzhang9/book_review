<?php  
/**
* 
*/
class Book extends CI_Model
{
	public function get_book($title){
        $query = "SELECT * FROM books
                    WHERE books.title = ?
                    ";
        $values = array($title);
		return $this->db->query($query,$values)->row_array();
	}

    public function get_book_by_id($id){
        $query = "SELECT * FROM books
                    WHERE books.id = ?
                    ";
        $values = array($id);
        return $this->db->query($query,$values)->row_array();
    }


	public function add_book($book){
		$query = "INSERT INTO books (title,author) 
                    VALUES(?,?)";
		$values = array($book['title'],$book['author']);
		return $this->db->query($query,$values);
	}

    public function get_review($book_id){
        $query = "SELECT reviews.id as id, reviews.review as review,reviews.rating as rating, 
        books.id as book_id, users.name as user_name,reviews.created_at as created_at
                FROM reviews
                LEFT JOIN books on reviews.book_id = books.id
                LEFT JOIN users on reviews.user_id = users.id
                WHERE books.id = ?
                ORDER BY reviews.created_at DESC
                ";
        $values = array($book_id);
        return $this->db->query($query,$values)->result_array();
    }

    public function get_review_by_title($book_title){
        $query = "SELECT reviews.id as id, reviews.review as review, reviews.rating as rating, 
        books.title as book_title, users.name as user_name,users.id as user_id,
        reviews.created_at as created_at
                FROM reviews
                LEFT JOIN books on reviews.book_id = books.id
                LEFT JOIN users on reviews.user_id = users.id
                WHERE books.title = ?
                ORDER BY reviews.created_at DESC
                ";
        $values = array($book_title);
        return $this->db->query($query,$values)->result_array();
    }

    public function get_recent_review(){
        $query = "SELECT reviews.id as id, reviews.review as review,reviews.rating as rating, 
        books.id as book_id, books.title as title, books.author as author,users.id as user_id,
        users.name as user_name,reviews.created_at as created_at
                FROM reviews
                LEFT JOIN books on reviews.book_id = books.id
                LEFT JOIN users on reviews.user_id = users.id
                ORDER BY reviews.created_at DESC
                
                LIMIT 3
                ";
        return $this->db->query($query)->result_array();
    }

    public function add_review($review){
        $query = "INSERT INTO reviews (review,rating,user_id,book_id,created_at) 
                    VALUES(?,?,?,?,NOW())";
        $values = array($review['review'],$review['rating'],$review['user_id'],$review['book_id']);
        return $this->db->query($query,$values);
    }

    public function get_book_with_reviews(){
        $query = "SELECT books.id as id, books.title as title, 
                    books.author as author, count(reviews.id) as total_reviews
                    FROM books
                    LEFT JOIN reviews on reviews.book_id = books.id
                    GROUP BY books.title";
        return $this->db->query($query)->result_array();
    }

    public function delete_review($id){
        $query = "DELETE from reviews
                    WHERE id = ?";
        $values = array($id);
        return $this->db->query($query,$values);
    }   

}
?>