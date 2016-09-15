<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class PasswordConfirmationTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR PASSWORD CONFIRMATION////////////////////////////////////////////////////////////////////


    //Password correct
    public function testPasswordCorrect()
    {
        $validator=new Validator();
        $result=$validator->passwordConfirmation("123456","123456");
        $this->assertTrue($result[0]);
    }


   //Password is empty
    public function testPasswordEmpty()
    {
        $validator=new Validator();
        $result=$validator->passwordConfirmation("123456","");
        $this->assertFalse($result[0]);
        $this->assertEquals('Password confirmation is required.',$result[1]);
    }



    //Passwords do not match
    public function testPasswordsNotMarch()
    {
        $validator=new Validator();
        $result=$validator->passwordConfirmation("123456","12345");
        $this->assertFalse($result[0]);
        $this->assertEquals('Passwords do not match.',$result[1]);
    }

}