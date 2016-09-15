<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class TypeTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR TYPE////////////////////////////////////////////////////////////////////


    //Type correct

    public function testTypeCorrect()
    {
        $validator=new Validator();
        $result=$validator->type("2");
        $this->assertTrue($result[0]);
    }


   //Type is empty
    public function testTypeEmpty()
    {
        $validator=new Validator();
        $result=$validator->type("");
        $this->assertFalse($result[0]);
        $this->assertEquals('Type is required.',$result[1]);
    }

    //Type doesn't exist in database
    public function testFalseType()
    {
        $validator=new Validator();
        $result=$validator->type("10000");
        $this->assertFalse($result[0]);
        $this->assertEquals('Type is not valid.',$result[1]);
    }

}