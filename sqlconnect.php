<?php
	$dbconn = pg_connect("host=localhost port=5432 dbname=foodexpress");
	echo $dbconn;
?>