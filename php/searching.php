<?php


	session_start(); 
    require_once  ('./util.php'); 

    //Store $_GET data into into variables
    $name= $_GET['name'];
    $country=$_GET['country'];
    $state=$_GET['state'];
    $type= $_GET['type'];

    $results

    if($name==""&&$country==""&&$state==""&&$type==""){
        $errors="<div id='alert' >At least choose a filter or try a name.</div>";
        $_SESSION['errors']=$errors;
        header('Location: ./../searching.php'); 
    }else{
        $query="SELECT * FROM musicartist WHERE 1=1";
    
        if($name!="")
            $query=$query.' AND name LIKE "%'.$name.'%" ';

        if($country!="")
            $query=$query.' AND id_country='.$country;

        if($state!="")
            $query=$query.' AND id_state='.$state;

        if($type!="")
            $query=$query.' AND id_type='.$type;
          $data= consult ($query);
        
        if(count($data)>0){
            $_SESSION['search']=$data;
            header('Location: ./../searching.php'); 
        }
        else
        {
            $errors="<div id='alert' >Results not found.</div>";
            $_SESSION['errors']=$errors;
            header('Location: ./../searching.php'); 
        }
    }

     

  


    
    


?>