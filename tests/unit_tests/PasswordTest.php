<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class PasswordTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR PASSWORD////////////////////////////////////////////////////////////////////


    //Password correct
    public function testPasswordCorrect()
    {
        $validator=new Validator();
        $result=$validator->password("123456");
        $this->assertTrue($result[0]);
    }


   //Password is empty
    public function testPasswordEmpty()
    {
        $validator=new Validator();
        $result=$validator->password("");
        $this->assertFalse($result[0]);
        $this->assertEquals('Password is required.',$result[1]);
    }

     //Password less than 6 characters
    public function testPasswordLessThan6()
    {
        $validator=new Validator();
        $result=$validator->password("12345");
        $this->assertFalse($result[0]);
        $this->assertEquals('Password must be at least 6 characters.',$result[1]);
    }

    //Password more than 255 characters
    public function testNameMoreThan255()
    {
        $validator=new Validator();
        $result=$validator->password("alealexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexx@hotmail.com");
        $this->assertFalse($result[0]);
        $this->assertEquals('Password must be less than 255 characters.',$result[1]);
    }

}