<?php
   //Ajax for the state combobox


	include ('./util.php'); 


	//Recover country's states
    $data= consult ('SELECT * FROM state WHERE id_country='.$_POST['idComboBox']);


    //Building html code for the combobox
    $html='<option value="">No selected</option>';
    foreach ($data as $row) {
        $html=$html.'<option value="'.$row[0].'">'.$row[1].'</option>';
    }


    //Retrieve html code
    echo $html;



?>