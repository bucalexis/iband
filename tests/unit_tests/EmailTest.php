<?php
 


require dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class EmailTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR EMAIL////////////////////////////////////////////////////////////////////


    //Email correct

    public function testEmailCorrect()
    {
        $validator=new Validator();
        $result=$validator->email("alex@hotmail.com");
        $this->assertTrue($result[0]);
    }


   //Email is empty
    public function testEmailEmpty()
    {
        $validator=new Validator();
        $result=$validator->email("");
        $this->assertFalse($result[0]);
        $this->assertEquals('Email is required.',$result[1]);
    }

    //Email more than 255 characters
    public function testEmailMoreThan255()
    {
        $validator=new Validator();
        $result=$validator->email("alealexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexx@hotmail.com");
        $this->assertFalse($result[0]);
        $this->assertEquals('Email must be less than 255 characters.',$result[1]);
    }

    //Email already exists
    public function testEmailAlreadyExists()
    {
        $validator=new Validator();
        $result=$validator->email("krobinsonrq@blogspot.com");
        $this->assertFalse($result[0]);
        $this->assertEquals('Email already exists.',$result[1]);
    }
}