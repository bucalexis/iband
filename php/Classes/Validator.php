<?php

require_once dirname(__FILE__) . '/../util.php'; 

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

     //Validate an email
    public function emailLogin($email){
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
              if(!booleanConsult("SELECT * FROM musicartist WHERE email='".$email."'")) {
                  $result[0]=false;
                  $result[1]='Email does not exist.';
                  }
               }
           }
        }

        return $result;
    }

    
    //Validate type
    public function type($type){
        $result[0]=true;
        $result[1]="";
        if($type!=""){
            
            if(!booleanConsult("SELECT * FROM type WHERE id=".$type)) {
                  $result[0]=false;
                  $result[1]='Type is not valid.';
              }
            }
            else{
                  $result[0]=false;
                  $result[1]='Type is required.';
            }
        return $result;
    }

    //Validate country
    public function country($country){
        $result[0]=true;
        $result[1]="";
        if($country!=""){
            if(!booleanConsult("SELECT * FROM country WHERE id=".$country)) {
                $result[0]=false;
                $result[1]='Country is not valid.';
               }
           }
             else{
                $result[0]=false;
                $result[1]='Country is required.';
             }

        return $result;
    }


    //Validate state
    public function state($state){
        $result[0]=true;
        $result[1]="";

        if($state!=""){
            if(!booleanConsult("SELECT * FROM state WHERE id=".$state)) {
                $result[0]=false;
                $result[1]='State is not valid.';
            }
        }
        else{
              $result[0]=false;
              $result[1]='State is required.';
        }

        return $result;
    }

    //Validate password
    public function password($password){
        $result[0]=true;
        $result[1]="";

        if($password==""){
            $result[0]=false;
            $result[1]='Password is required.';
        }
        else{
            if(strlen($password)<6){
                $result[0]=false;
                $result[1]='Password must be at least 6 characters.';
            }
            if(strlen($password)>255){
                $result[0]=false;
                $result[1]='Password must be less than 255 characters.';
            }
        }

        return $result;
    }


    //Validate password confirmation
    public function passwordConfirmation($password,$passwordConfirmation){
        $result[0]=true;
        $result[1]="";

         if($passwordConfirmation==""){
            $result[0]=false;
            $result[1]='Password confirmation is required.';
         }
         else{
            if($passwordConfirmation!=$password){
                $result[0]=false;
                $result[1]='Passwords do not match.';
            }
        }

        return $result;
    }

    //Validate change password
    public function changePassword($old,$new,$confirmation,$user){
        $result[0]=true;
        $result[1]="";

        //If was received only confirmation
         if(($old==""&&$new=="")&&$confirmation!=""){
            $result[0]=false;
            $result[1]='Current password is required.';
            return $result;
         }

         //If was received only new and confirmation
         if($old==""&&($new!=""&&$confirmation!="")) {
            $result[0]=false;
            $result[1]='Current password is required.';
            return $result;
         }

         //If was received old and new without confirmation
         if(($old!=""&&$new!="")&&$confirmation==""){
            $result[0]=false;
            $result[1]='Cofirmation new password is required.';
            return $result;
         }

         //If was old without new
         if(($old!=""&&$new=="")&&$confirmation==""){
            $result[0]=false;
            $result[1]='New password is required.';
            return $result;
         }

         //If was received only new
         if(($old==""&&$new!="")&&$confirmation==""){
            $result[0]=false;
            $result[1]='Current password is required.';
            return $result;
         }

          //If was received only old and confirmation
         if(($old!=""&&$confirmation!="")&&$new==""){
            $result[0]=false;
            $result[1]='New password is required.';
            return $result;
         }

         if(($old!=""&&$new!="")&&$confirmation!=""){
            if(strlen($old)<6){
                $result[0]=false;
                $result[1]='Password must be at least 6 characters.';
                return $result;
            }  
            if(strlen($old)>255){
                $result[0]=false;
                $result[1]='Password must be less than 255 characters.';
                return $result;
            }  
            if(strlen($new)<6){
                $result[0]=false;
                $result[1]='New password must be at least 6 characters.';
                return $result;
            }  
            if(strlen($new)>255){
                $result[0]=false;
                $result[1]='New password must be less than 255 characters.';
                return $result;
            }    
            if($new!=$confirmation){
                $result[0]=false;
                $result[1]='Passwords do not match.';
                return $result;
            }  


            if(!booleanConsult('SELECT * FROM musicartist WHERE id='.$user.' AND password='.'"'.$old.'"')) {
                $result[0]=false;
                $result[1]='Wrong password.';
                return $result;
            }

            
         }

        

        return $result;
    }


    public function genericLength($text,$limit,$field_name){
        $result[0]=true;
        $result[1]="";

        if(strlen($text)>$limit){
            $result[0]=false;
            $result[1]=$field_name.' must be less than '.$limit.' characters.';
        }

        return $result;
    }

    //Validate image URL
    public function imageURL($image){
        $result[0]=true;
        $result[1]="";

        if($image!="")
        {
            if(strlen($image)>255){
                $result[0]=false;
                $result[1]='Image URL must be less than 255 characters.';
            }
            else{
                 if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$image)) {
                 $result[0]=false;
                 $result[1]='Wrong image URL.';
               }
               else{
                    try{
                        if(getimagesize($image)<1){
                         $result[0]=false;
                         $result[1]='Wrong image URL.';          
                      }

                    }catch(Exception $e){
                        $result[0]=false;
                        $result[1]='Wrong image URL.'; 

                    }
                  
                }
            }

        }

            return $result;
    }
      
      

    


}
?>