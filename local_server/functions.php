<?php
	session_start();
	$error;
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
					break;
			case 'information':
					$info = getInfo();
					break;
			case 'newinfo':
					$info = getPassword();
					if($info['password'] != $_POST['password']){
						echo "Sbagliata password corrente";
					}else if($_POST['npassword'] != $_POST['rnpassword'])
						echo "Errore nuove password";
					else updateInfo();
					break;
			case 'loginadmin':
					
					if( (strcmp($_POST['admin'],"admin")== 0) && (strcmp($_POST['password'],"admin")== 0)){
						$_SESSION['login']="logged";
						header("location:index.php");
					}
					break;
			case 'deleteaccount':
					deleteAccount();
					break;
			case 'getcategory':
					$category = getCategory();
					break;
			case 'newplate':
					echo "nuovo piatto";
					newPlate();
					break;
					
		}
	}
	
	function login($email,$password){
		$conn = connection_db();
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
		$conn = connection_db();
		$result = pg_query("INSERT INTO foodexpress.client(email,name,surname,password,telephone) VALUES('".$email."','".$name."','".$surname."','".$password."','".$telephone."')") or die('Query failed: ' . pg_last_error());
		if(!$result){
			$error="Errore registrazione db. Riprova";
		}else{
			$_SESSION['email']=$email;
			$_SESSION['name']=$name;
			header("location:index.php");
		}
		pg_close($conn);
		
	}
	
	function getInfo(){
		$conn = connection_db();
		$result = pg_query("SELECT * FROM foodexpress.client WHERE email = '".$_SESSION['email']."'") or die('Query failed: ' . pg_last_error());
		$line = pg_fetch_array($result, null, PGSQL_ASSOC);
		pg_close($conn);
		return $line;
	}
	
	function getPassword(){
		$conn = connection_db();
		$result = pg_query("SELECT password FROM foodexpress.client WHERE email = '".$_SESSION['email']."'") or die('Query failed: ' . pg_last_error());
		$line = pg_fetch_array($result, null, PGSQL_ASSOC);
		print_r($line);
		pg_close($conn);
		return $line;
	}
	
	function updateInfo(){
		$email = $_POST['email'];
		$password = $_POST['npassword']; 
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$telephone = $_POST['telephone'];
		$conn = connection_db();
		$result = pg_query("UPDATE foodexpress.client SET email='".$email."', name='".$name."',surname='".$surname."',password='".$password."',telephone='".$telephone."' WHERE email='".$_SESSION['email']."'") or die('Query failed: ' . pg_last_error());
		if(!$result){
			echo "Error";
		}
		pg_close($conn);
		
		$_SESSION['email'] = $email;
		$_SESSION['name']= $name;
		
	}
	
	function deleteAccount(){
		$conn = connection_db();
		$result = pg_query("DELETE FROM foodexpress.client WHERE email='".$_SESSION['email']."'") or die('Query failed: ' . pg_last_error());
		if(!$result){
			echo "Error";
		}
		pg_close($conn);
		session_unset();
		header("location:index.php");
		
	}
	
	function getCategory(){
		$conn = connection_db();
		$result = pg_query("SELECT * FROM foodexpress.category") or die('Query failed: ' . pg_last_error());
		if(!$result){
			echo "Error";
		}
		$category=array();
		while($row = pg_fetch_assoc($result)){
			$category[]=$row;
		}
		pg_close($conn);
		return $category;
	}
	
	function newPlate(){
		//checkImage();
		//checkAttribute();
		//inserimento nel db
	}
	
	function connection_db(){
		$conn = pg_connect("host=localhost dbname=foodexpress") or die('Could not connect: ' . pg_last_error());
		return $conn;
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
	