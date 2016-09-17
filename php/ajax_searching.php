<?php
   //Ajax for the state combobox


	require_once ('./util.php'); 

    //Store $_POST data into an array
    $input=array(
        'name' => trim($_GET['name'])
        );


	//Recover by name
    $data= consult ('SELECT * FROM musicartist WHERE name LIKE "%'.$input['name'].'%"');

    
    $parsedData;
    $i=0;
    echo json_encode($data);
   



?>