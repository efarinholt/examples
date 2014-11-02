<?php

require('pdoConnectionClass.php');

class cl_UserActions{ 
	
	private $db;
	public function __construct(){
		$this->db = new Connection();
		$this->db = $this->db->dbConnect();
	}
	
	public function fx_InstertRecord($user_first, $user_last, $user_email){ 
		try {	
			$st = $this->db->prepare("
				INSERT INTO tbl_TableName
				(user_first, user_last, user_email,user_timestamp) 
				VALUES 
				(?,?,?,NOW())
			");
		
			$st->bindParam(1, $user_first); 
			$st->bindParam(2, $user_last);
			$st->bindParam(3, $user_email);
			$st->execute();
		}catch(PDOException $e){
			print $e->getMessage();
		}
			
	}
	
	public function fx_CheckEmail($user_email){ 
		try {
			$st = $this->db->prepare("
				SELECT * FROM tbl_TableName 
				WHERE user_email = '$user_email'
			"); 
			$st->bindColumn('user_first', $user_first);
			$st->bindColumn('user_last', $user_last);
			$st->execute();
			
			while($st->fetch(PDO::FETCH_BOUND)){
				return array($user_first, $user_last); 
			}	
		}catch(PDOException $e){
			print $e->getMessage();
		}
	}
}

?>
