<?php

require dirname(__FILE__) . '/../util.php'; 

//All the functions return the array '$result', 
//result[0] is a flag to determina the if there were errors presence
//result[1] stores in text the type of error

class Validator {

    //Validate name
    public function name($name){
        $result[0]=true;
        $result[1]="";

        if($name==""){
            $result[0]=false;
            $result[1]='Name is required.';
        }
        if(strlen($name)>255){
            $result[0]=false;
            $result[1]='Name must be less than 255 characters.';
        }

        return $result;

    }


    //Validate an email
    public function email($email){
        $result[0]=true;
        $result[1]="";
        if($email==""){
            $result[0]=false;
            $result[1]='Email is required.';
    }
    else{
        if(strlen($email)>255){
            $result[0]=false;
            $result[1]='Email must be less than 255 characters.';
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result[0]=false;
                $result[1]='Wrong email.';
            }
            else{
              if(booleanConsult("SELECT * FROM musicartist WHERE email='".$email."'")) {
                  $result[0]=false;
                  $result[1]='Email already exists.';
                  }
               }
           }
        }

        return $result;
    }


}
?>