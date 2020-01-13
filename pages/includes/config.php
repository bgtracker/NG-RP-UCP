<?php
$con = new PDO("mysql:host=localhost;dbname=db", "user", "password");
	
session_start();
function checkForLogin()
{
	if(!isset($_SESSION['playername']))
	{
		//header("Location:login.php");
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';    
		exit;
	}
}
?>