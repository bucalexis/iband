<?php
 //Controller to validate the information from the login view, if everything is correct the user access to the system
 session_start(); 
 include ('./util.php'); 
    

    $input=array(
    	'email'=> trim($_POST['email']),
    	'password'=> $_POST['password'],
    	);


    $correct=true;
    $errors='<div id="alert" >';


    //Validate email
    if($input['email']==""){
    	$correct=false;
    	$errors=$errors.'Email is required.<br>';
    }
    else{
	    if(strlen($input['email'])>255){
	    	$correct=false;
	    	$errors=$errors.'Email must be less than 255 characters.<br>';
	    }
      else{
        if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
        $correct=false;
        $errors=$errors.'Wrong email.<br>';
        }
        else{
           if(!booleanConsult("SELECT * FROM musicartist WHERE email='".$input['email']."'")) {
           $correct=false;
           $errors=$errors.'Email does not exist.<br>';
         }
        }
      }  
     }

    //Validate password
     if($input['password']==""){
    	$correct=false;
    	$errors=$errors.'Password is required.<br>';
    }
    else{
	    if(strlen($input['password'])<6){
	    	$correct=false;
	    	$errors=$errors.'Password must be at least 6 characters.<br>';
	    }
	    if(strlen($input['password'])>255){
	    	$correct=false;
	    	$errors=$errors.'Password must be less than 255 characters.<br>';
	    }
	   }
 
    if($correct){
      //If there're no errors the user login into the system
      if(booleanConsult("SELECT * FROM musicartist WHERE email='".$input['email']."'"." AND password='".$input['password']."'")){
        $user=consult("SELECT * FROM musicartist WHERE email='".$input['email']."'"." AND password='".$input['password']."'");
        $_SESSION['user']=$user[0]['id'];
        header('Location: ./../myprofile.php'); 
      }
      else{
        $errors=$errors.'Wrong email/password.<br>';
        $errors=$errors.'</div>';
        $_SESSION['errors']=$errors;
        header('Location: ./../login.php');  
      }

    }
    else{
        $errors=$errors.'</div>';
        $_SESSION['errors']=$errors;
        header('Location: ./../login.php');  
    }

 


  


?>