<?php
$con = new PDO("mysql:host=127.0.0.1;dbname=name", "user", "pwd");
	
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