<?php
	$conn = pg_connect("host=localhost dbname=foodexpress") or die('Could not connect: ' . pg_last_error());
?>