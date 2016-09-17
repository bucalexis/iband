<?php



//Connnect to the database
function createConnection()
{
    $mysql = mysqli_connect("localhost","root","","iband_db");
    return $mysql;
}

//Close connection
function closeConnection($mysql)
{
    mysqli_close($mysql);
}


//Retrieve an array of a consult, $query= SQL statement with the consult
function consult($query)
{
    $mysql=createConnection();
    
 // Query execution; returns identifier of the result group
   $results = $mysql->query($query);
   $array=null;
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


//Retrieve true or false if a record exists in the database, $query= consult for a specific record in the database
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



//Executes a atomic transaction: insert, delete or update
//$sql= sql statement with the transaction
function dml($sql){

    $mysql=createConnection();
  
    if ($mysql->query($sql) === TRUE) {
      
    } else {
        //echo 'Error updating record: ' . $mysql->error;
      }


      closeConnection($mysql);
    
  }




?>

