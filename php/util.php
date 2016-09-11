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

function compruebaRegistro($query)
{
    $mysql=createConnection();
    
 // Query execution; returns identifier of the result group
   $results = $mysql->query("SELECT * FROM country");
   $array;
   $i=0;
    
    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
    // use of numeric index
      $array[$i]=$row;
      $i++;
    }

  print_r ($array);
  mysqli_free_result($results);
  closeConnection($mysql);
 
}

compruebaRegistro("");

?>

