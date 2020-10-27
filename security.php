<?php
	session_start();
	
	if (!$_SESSION['korisnik'])
	{
		header("Location: login.php");
	}

?>