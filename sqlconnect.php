<?php
	/*$dbconn = pg_connect("host=localhost port=5432 dbname=foodexpress");
	echo $dbconn;*/
    try {
		  // connessione tramite creazione di un oggetto PDO
		   $myPDO = new PDO('pgsql:host=localhost;dbname=foodexpress', 'Omar', '');

	}
	catch(PDOException $e) {
		  // notifica in caso di errorre
		  echo 'Error: '.$e->getMessage();
	}
?>