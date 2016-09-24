<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class StateTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR STATE////////////////////////////////////////////////////////////////////


    //State correct
    public function testStateCorrect()
    {
        $validator=new Validator();
        $result=$validator->state("2");
        $this->assertTrue($result[0]);
    }


   //State is empty
    public function testStateEmpty()
    {
        $validator=new Validator();
        $result=$validator->state("");
        $this->assertFalse($result[0]);
        $this->assertEquals('State is required.',$result[1]);
    }

    //State doesn't exist in database
    public function testFalseState()
    {
        $validator=new Validator();
        $result=$validator->state("1000000");
        $this->assertFalse($result[0]);
        $this->assertEquals('State is not valid.',$result[1]);
    }

}