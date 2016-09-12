<?php

function createConnection()
{
    $mysql = mysqli_connect("localhost","root","","iband_db");
    return $mysql;
}
function closeConnection($mysql)
{
    mysqli_close($mysql);
}

function consult($query)
{
    $mysql=createConnection();
    
 // Query execution; returns identifier of the result group
   $results = $mysql->query($query);
   $array;
   $i=0;
    
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
    // use of numeric index
      $array[$i]=$row;
      $i++;
    }
  mysqli_free_result($results);
  closeConnection($mysql);

  return $array;
 
}

function booleanConsult($query)
{
    $mysql=createConnection();
    
 // Query execution; returns identifier of the result group
   $results = $mysql->query($query);
    $array;
    $array[0]['id']=0;
    $i=0;
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
    // use of numeric index
      $array[$i]=$row;
      $i++;
    }
  mysqli_free_result($results);
  closeConnection($mysql);
  

  
  if($array[0]['id']!=0)
    return true;
  else{
    //echo 'false';
    return false;
  }
  

}


function dml($sql){

    $mysql=createConnection();
  
    if ($mysql->query($sql) === TRUE) {
      
    } else {
        //echo 'Error updating record: ' . $mysql->error;
      }


      closeConnection($mysql);
    
  }



?>

