<?php 
error_reporting(E_ALL & ~E_NOTICE);
///////////////////////////////////////////////
//  MODULE CONTROL 			                    //
//  DATE : 15/01/2021                      //
//  AUTOR : VICTOR M RODRIGUEZ            //
//  EMAIL _ info@caribesoft.net          //
/////////////////////////////////////////

      include 'connect.php';

      /// PASSWORD VALIDATION ////
       $db->Consultar("SELECT DECODE(passcode,'oswego') as contra FROM api_users 
        WHERE  user='" . $_POST["user"]. "'");
  	    while($row = $db->ObtenerArray()) {	 
  		    $pass_user = $row['contra'];
  	     } 

      /// USER VALIDATION ////
      if($pass_user == $_POST["passcode"]){   
        $db->Consultar("SELECT Count(*) AS total FROM api_users 
        WHERE user='" . $_POST["user"]. "'");
        while($row = $db->ObtenerArray()) {	 
		      $exist = $row['total'];
	      }
       } 
	     
       if($exist <> 0 ){
         // CREATE SESSION
          session_start(); 
          $_SESSION["authenticated"]= "YES"; 
          $_SESSION["user"]= $user; 
      		$result = "OK";	
      }else { 
		      $result = "ERROR";	
      } 
          echo json_encode($result);
?> 
