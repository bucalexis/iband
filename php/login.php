<?php
 //Controller to validate the information from the login view, if everything is correct the user access to the system
 session_start(); 
 require ('./Classes/Validator.php');
 $validator=new Validator();
    

    $input=array(
    	'email'=> trim($_POST['email']),
    	'password'=> $_POST['password'],
    	);


    $correct=true;
    $errors='<div id="alert" >';


    //Validate email
    $result=$validator->emailLogin($input['email']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate password
    $result=$validator->password($input['password']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
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