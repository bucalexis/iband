<?php
   //Ajax for the state combobox


	require_once ('./util.php'); 

    //Store $_POST data into an array
    $name= trim($_GET['name']);
    $country=$_GET['country'];
    $state=$_GET['state'];
    $type= $_GET['type'];

    if($name==""&&$country==""&&$state==""&&$type==""){
        $errors="<div id='alert' >At least choose a filter or try a name.</div>";
        $_SESSION['errors']=$errors;
        header('Location: ./../searching.php'); 
    }
    else{

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

        $clientes = array();
      

       if(count($data)>0)
       foreach ($data as $row) 
        { 
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $musiclist=$row['musiclist'];
            $description=$row['description'];
            $phone=$row['phone'];
            $price=$row['price'];
            $image=$row['image'];


            $type=consult("SELECT name FROM type WHERE id=".$row['id_type']);
            $type=$type[0]['name'];
            $country=consult("SELECT name FROM country WHERE id=".$row['id_country']);
            $country=$country[0]['name'];
            $state=consult("SELECT name FROM state WHERE id=".$row['id_state']);
            $state=$state[0]['name'];
            

            $clientes[] = array('id'=> $id, 'name'=> $name, 'type'=> $type, 'email'=> $email,
                                 'price'=>$price,'phone'=>$phone, 'musiclist'=>$musiclist, 'description' => $description,
                                 'state'=>$state, 'country'=> $country, 'image'=>$image);

        }

        

        
     $json_string = json_encode($clientes);
      echo $json_string;
       

        
    }




?>