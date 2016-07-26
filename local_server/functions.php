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
					$email = $_POST['email'];
					$password = $_POST['password']; 
					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$telephone = $_POST['telephone'];
					signup($email,$password,$name,$surname,$telephone);
					break;
			case 'logout':
					session_destroy();
					header("location:index.php");
		}
	}
	
	function login($email,$password){
		connection_db();
		$result = pg_query("SELECT email, name FROM foodexpress.client WHERE email = '".$email."' AND password = '".$password."'") or die('Query failed: ' . pg_last_error());
		
		$line = pg_fetch_array($result, null, PGSQL_ASSOC);
		if(!empty($line)){
			$_SESSION['name'] = $line['name'];
			$_SESSION['email'] = $line['email'];
			header("location:index.php");
		}
		else echo "errore sql";
		pg_close($conn);
		//$sql = "SELECT email, password FROM foodexpress.client WHERE email = '$1' AND password = '$2'";
	/*	$sql= "SELECT * FROM foodexpress.client;";
		$resource = pg_prepare($conn, "cmd" ,$sql);
		$value = array();
		$resource = pg_execute($conn, "cmd", $value);
		$row = pg_fetch_array($resource, NULL, PGSQL_ASSOC);
		print_r($row);		
	*/
	}
	
	function signup($email,$password,$name,$surname,$telephone){
		connection_db();
		$result = pg_query("INSERT INTO foodexpress.client(email,name,surname,password,telephone) VALUES('".$email."','".$name."','".$surname."','".$password."','".$telephone."')") or die('Query failed: ' . pg_last_error());
		if(!$result){
			echo "Error";
		}
		pg_close($conn);
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
	