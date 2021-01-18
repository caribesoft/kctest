<?php 
session_start(); 

//CHECK IF USER IS AUTHENTICATED
if ($_SESSION["authenticated"] != "YES") { 
    $results = 'ERROR';
}else{
	$results = 'OK';
} 
echo json_encode($results);
?> 
