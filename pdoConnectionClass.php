<?php

class Connection{ // define class name
	public function dbConnect(){ // define function name
		return new PDO("mysql:host=localhost; dbname=db_DatabaseName", "root", "do1ttom3"); 
	}
}

?>
