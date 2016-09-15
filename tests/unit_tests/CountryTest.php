<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class CountryTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR COUNTRY////////////////////////////////////////////////////////////////////


    //Country correct

    public function testCountryCorrect()
    {
        $validator=new Validator();
        $result=$validator->country("2");
        $this->assertTrue($result[0]);
    }


   //Country is empty
    public function testCountryEmpty()
    {
        $validator=new Validator();
        $result=$validator->country("");
        $this->assertFalse($result[0]);
        $this->assertEquals('Country is required.',$result[1]);
    }

    //Country doesn't exist in database
    public function testFalseCountry()
    {
        $validator=new Validator();
        $result=$validator->country("1000000");
        $this->assertFalse($result[0]);
        $this->assertEquals('Country is not valid.',$result[1]);
    }

}