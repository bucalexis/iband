<?php
 session_start(); 
  
    
	include ('./util.php'); 
    

    $input=array(
    	'name' => trim($_POST['name']),
    	'type'=> $_POST['type'],
    	'country'=> $_POST['country'],
    	'state'=> $_POST['state'],
    	'email'=> trim($_POST['email']),
    	'password'=> $_POST['password'],
    	'password2'=> $_POST['password2'],
    	'phone'=> trim($_POST['phone']),
    	'price'=> trim($_POST['price']),
    	'image'=> $_POST['image'],
    	'musiclist'=> trim($_POST['musiclist']),
    	'description'=> trim($_POST['description'])
    	);


    $correct=true;
    $errors="";

    //Validate name
    if($input['name']==""){
    	$correct=false;
    	$errors=$errors.'Name is required.<br>';
    }
    if(strlen($input['name']>255)){
    	$correct=false;
    	$errors=$errors.'Name must be less than 255 characters.<br>';
    }

    //Validate type
    if($input['type']!=""){
	    if(!booleanConsult("SELECT * FROM type WHERE id=".$input['type'])) {
	    	$correct=false;
	    	$errors=$errors.'Type is not valid.<br>';
	    }
	}
	else{
		$correct=false;
	    $errors=$errors.'Type is not valid.<br>';
	}


    //Validate country
    if($input['country']!=""){
	    if(!booleanConsult("SELECT * FROM country WHERE id=".$input['country'])) {
	    	$correct=false;
	    	$errors=$errors.'Country is not valid.<br>';
	    }
	}
	else{
		$correct=false;
	    $errors=$errors.'Country is not valid.<br>';
	}

    //Validate state
    if($input['state']!=""){
	    if(!booleanConsult("SELECT * FROM state WHERE id=".$input['state'])) {
	    	$correct=false;
	    	$errors=$errors.'State is not valid.<br>';
	    }
	}
	else{
		$correct=false;
	    $errors=$errors.'State is not valid.<br>';
	}

    //Validate email
    if($input['email']==""){
    	$correct=false;
    	$errors=$errors.'Email is required.<br>';
    }
    else{
	    if(strlen($input['email']>255)){
	    	$correct=false;
	    	$errors=$errors.'Email must be less than 255 characters.<br>';
	    }

	   
	    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
	    	$correct=false;
	    	$errors=$errors.'Wrong email.<br>';
	    }

	   
	    if(booleanConsult("SELECT * FROM state WHERE email=".$input['email'])) {
	    	$correct=false;
	    	$errors=$errors.'Email already exists.<br>';
         }
     }

    //Validate password
     if($input['password']==""){
    	$correct=false;
    	$errors=$errors.'Password is required.<br>';
    }
    else{
	    if(strlen($input['password']<6)){
	    	$correct=false;
	    	$errors=$errors.'Password must be at least 6 characters.<br>';
	    }
	    if(strlen($input['password']>255)){
	    	$correct=false;
	    	$errors=$errors.'Password must be less than 255 characters.<br>';
	    }
	}

    //Validate password2
     if($input['password2']==""){
    	$correct=false;
    	$errors=$errors.'Password confirmation is required.<br>';
    }
    else{
	    if($input['password2']!=$input['password']){
	    	$correct=false;
	    	$errors=$errors.'Passwords do not match.<br>';
	    }
	}
    
    //Validate phone
    if(strlen($input['phone']>255)){
    	$correct=false;
    	$errors=$errors.'Phone must be less than 255 characters.<br>';
    }

    //Validate price
    if(strlen($input['price']>255)){
    	$correct=false;
    	$errors=$errors.'Price must be less than 255 characters.<br>';
    }

    //Validate musiclist
    if(strlen($input['musiclist']>500)){
    	$correct=false;
    	$errors=$errors.'Music list must be less than 500 characters.<br>';
    }

    //Validate description
    if(strlen($input['description']>500)){
    	$correct=false;
    	$errors=$errors.'Description must be less than 500 characters.<br>';
    }


    //Validate url

    if($input['image']!="")
    {
	    if(strlen($input['image']>255)){
	    	$correct=false;
	    	$errors=$errors.'Image URL must be less than 255 characters.<br>';
	    }

	    if (!filter_var($input['email'], FILTER_VALIDATE_URL)){
	    	$correct=false;
	    	$errors=$errors.'Wrong image URL.<br>';
	    }
	}




   $_SESSION['errors']=$errors;
   header('Location: ./../register.php');

?>