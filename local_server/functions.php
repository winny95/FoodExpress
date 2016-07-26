<?php
	session_start();
	if(isset($_REQUEST['function'])){
		switch($_REQUEST['function']){
			case 'login': 
					$email = $_POST['email'];
					$password = $_POST['password']; 
					login($email,$password);
					break;
			case 'signup':
					signup();
					break;
		}
	}
	
	function login($email,$password){
		connection_db();
		$result = pg_query("SELECT email, password FROM foodexpress.client WHERE email = '".$email."' AND password = '".$password."'") or die('Query failed: ' . pg_last_error());
		$line = pg_fetch_array($result, null, PGSQL_ASSOC);
		print_r($line);
	}
	
	function connection_db(){
		include 'sqlconnect.php';
	}
	
	
	/*
	session_start();
	include 'sqlconnect.php';
	
	if(isset($_REQUEST['function'])) {
		//login
		if($_REQUEST['function'] == 'login') {
			
		} else if($_REQUEST['function'] == 'getMenu') {
			$queryResult = pg_query("SELECT * FROM foodexpress.plate") or die('Query failed: ' . pg_last_error());
			$array = array();
			while($fetchedValue = pg_fetch_array($queryResult, null, PGSQL_ASSOC)) {
				$array[] = $fetchedValue;
			}
			$result = json_encode(array("result" => "OK", "list" => $array));
		}
	} else {
		$array = array("result" => "ERR_FUN");
		$result = json_encode($array);
	}
	print $result;
	//INSERT INTO foodexpress.plate(Title, Photo, Description, Prep, LevelComplexity, Available, Price, Quantity, Category) VALUES ('Titolo', '', 'Descrizione', 1, 1, true, 10.0, 10, 'Categoria1');
	*/
?>
	