<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class GenericTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////GENERIC TESTS////////////////////////////////////////////////////////////////////

    //This test is for musiclist, price, description and phone. They have a similar behavior so they were contained in
    // the same test file


    //Phone correct
    public function testPhoneCorrect()
    {
        $validator=new Validator();
        $result=$validator->genericLength("6421987878",255,"Phone");
        $this->assertTrue($result[0]);
    }

    //Phone more than 255
     public function testNameMoreThan255()
    {
        $validator=new Validator();
        $result=$validator->genericLength("alealexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexx@hotmail.com",255,"Phone");
        $this->assertFalse($result[0]);
        $this->assertEquals('Phone must be less than 255 characters.',$result[1]);
    }




}