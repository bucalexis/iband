<?php
  
	include ('./util.php'); 

    $data= consult ('SELECT * FROM state WHERE id_country='.$_POST['idComboBox']);

    $html='<option value="">No selected</option>';

    foreach ($data as $row) {
        $html=$html.'<option value="'.$row[0].'">'.$row[1].'</option>';
    }

    echo $html;



?>