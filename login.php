<?php
#Receiving the data sent by post method
$user=$_POST['username'];
$psd=$_POST['password'];

#encoding the data in json type
$data = array($user,$psd); 
$after_json = json_encode($data);

#Calling the python script
$output=shell_exec("py login.py ".$after_json);

if (strcmp(strtoupper(trim($output)),"DONE") == 0)
{	
	#This command opens the file of the global variables that are stored in the $_SESSION array
	session_start();
	$_SESSION['username'] = $user;
	#Calling the next php page in order to display the conversations
	header("Location: cours.php");
}
else 
	echo "Invalid credentials";
?>