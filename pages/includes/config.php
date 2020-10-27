<?php
$con = new PDO("mysql:host=localhost;dbname=samp", "root", "");
	
session_start();

$expireAfter = 15; // 15 Minutes

	if(isset($_SESSION['last_action'])){

	    $secondsInactive = time() - $_SESSION['last_action'];
	    $expireAfterSeconds = $expireAfter * 60; 
	    
	    if($secondsInactive >= $expireAfterSeconds) {

	        session_unset();
	        session_destroy();
	        header("Location: ..\login.php");
	    }
	}

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