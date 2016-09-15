<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class NameTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR NAME////////////////////////////////////////////////////////////////////


    //Name correct
    public function testNameCorrect()
    {
        $validator=new Validator();
        $result=$validator->name("alex");
        $this->assertTrue($result[0]);
    }


   //Name is empty
    public function testNameEmpty()
    {
        $validator=new Validator();
        $result=$validator->name("");
        $this->assertFalse($result[0]);
        $this->assertEquals('Name is required.',$result[1]);
    }

    //Name more than 255 characters
    public function testNameMoreThan255()
    {
        $validator=new Validator();
        $result=$validator->name("alealexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexx@hotmail.com");
        $this->assertFalse($result[0]);
        $this->assertEquals('Name must be less than 255 characters.',$result[1]);
    }

}