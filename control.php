<?php 
session_start();
///////////////////////////////////////////////
//  MODULE CONTROL 			                    //
//  DATE : 15/01/2021                      //
//  AUTOR : VICTOR M RODRIGUEZ            //
//  EMAIL _ info@caribesoft.net          //
/////////////////////////////////////////
    

      if ( !isset($_POST['username'], $_POST['passcode']) ) {
          exit('Please fill both the username and password fields!, 
            <a href="index.html">Go to login page</a>');
      }
      

      include 'connect.php';
      
      /// PASSWORD VALIDATION ////
       $db->Consultar("SELECT DECODE(passcode,'oswego') as contra FROM api_users 
        WHERE  user='" . $_POST["username"]. "'");
  	    while($row = $db->ObtenerArray()) {	 
  		    $pass_user = $row['contra'];
  	     } 

      /// USER VALIDATION ////
      if($pass_user == $_POST["passcode"]){   
        $db->Consultar("SELECT Count(*) AS total FROM api_users 
        WHERE user='" . $_POST["username"]. "'");
        while($row = $db->ObtenerArray()) {	 
		      $exist = $row['total'];
	      }
       } 
	     
       if($exist <> 0 ){
         // CREATE SESSION
           
          $_SESSION["authenticated"]= "YES"; 
          $_SESSION["user"]= $user; 
      		$result = "OK";	
      }else { 
		      $result = "ERROR";	
      } 
    
          echo json_encode($result);
?> 
