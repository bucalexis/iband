<?php

 //Controller to validate data from the register view and create an user.


 session_start(); 
 require ('./Classes/Validator.php');

 $validator=new Validator();


    

    //Store $_POST data into an array
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


    //Variable to determine if the fields are correct
    $correct=true;

    //If the fields are not correct the html code of the error will be stored in this variable
    $errors='<div id="alert" >';

  
    //Validate all the $_POST information

    //Validate name
    $result=$validator->name($input['name']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate type
    $result=$validator->type($input['type']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }


    //Validate country
    $result=$validator->country($input['country']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate state
    $result=$validator->state($input['state']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }


    //Validate email
    $result=$validator->email($input['email']);
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

    //Validate password2
    $result=$validator->passwordConfirmation($input['password'],$input['password2']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }
    
    //Validate phone
    $result=$validator->genericLength($input['phone'],255,'Phone');
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate price
    $result=$validator->genericLength($input['price'],255,'Price');
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate musiclist
    $result=$validator->genericLength($input['musiclist'],500,'Music list');
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

    //Validate description
    $result=$validator->genericLength($input['description'],500,'Description');
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }



    //Validate url
    $result=$validator->imageURL($input['image']);
    if(!$result[0]){
      $correct=false;
      $errors=$errors.$result[1].'<br>';
    }

  $errors=$errors.'</div>';


  //If there're no errors the user is created, on the other hand if there are, the errors will be displayed in the register view
  if($correct){
      $sql="INSERT INTO musicartist VALUES (".
      		"null,".
      		"'".$input['name']."',".
      		"'".$input['phone']."',".
      		"'".$input['price']."',".
      		"'".$input['email']."',".
      		"'".$input['password']."',".
      		"'".$input['image']."',".
      		"'".$input['musiclist']."',".
      		"'".$input['description']."',".
      		"'".$input['country']."',".
      		"'".$input['state']."',".
      		"'".$input['type']."',".
      		"null,".
      		"null)";
      
      dml($sql);
      $errors="<div id=success>Your account was created succesfully.</div>";
      $_SESSION['errors']=$errors;
      header('Location: ./../login.php');	
      

  }
  else{
  	$_SESSION['errors']=$errors;
    header('Location: ./../register.php');	
  }

   

?>