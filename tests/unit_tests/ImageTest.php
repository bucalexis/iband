<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class ImageTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////GENERIC TESTS////////////////////////////////////////////////////////////////////

    //This test is for musiclist, price, description and phone. They have a similar behavior so they were contained in
    // the same test file


    //Image correct
    public function testImageCorrect()
    {
        $validator=new Validator();
        $result=$validator->imageURL("https://www.google.com.mx/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png");
        $this->assertTrue($result[0]);
    }

    //Image more than 255
     public function testImageMoreThan255()
    {
        $validator=new Validator();
        $result=$validator->imageURL("alealexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexalexx@hotmail.com");
        $this->assertFalse($result[0]);
        $this->assertEquals('Image URL must be less than 255 characters.',$result[1]);
    }

    //Image wrong URL
     public function testWrongImage()
    {
        $validator=new Validator();
        $result=$validator->imageURL("asdasfasfafsdfsdfsdfdsfdsfdff");
        $this->assertFalse($result[0]);
        $this->assertEquals('Wrong image URL.',$result[1]);
    }

    //Image wrong URL - URL is not a image
     public function testWrongImage2()
    {
        $validator=new Validator();
        $result=$validator->imageURL("https://www.google.com.mx/images/branding/googlelogo/2x/googlelogo_color.html");
        $this->assertFalse($result[0]);
        $this->assertEquals('Wrong image URL.',$result[1]);
    }




}