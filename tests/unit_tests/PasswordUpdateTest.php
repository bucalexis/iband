<?php
 
require_once dirname(__FILE__) . '/../../php/Classes/Validator.php'; 
class PasswordUpdateTest extends \PHPUnit_Framework_TestCase
{

//////////////////////////////////TESTS FOR PASSWORD UPDATE////////////////////////////////////////////////////////////////////


    //Password is empty
    public function testPasswordEmpty()
    {
        $validator=new Validator();
        $result=$validator->changePassword("","","",999);
        $this->assertTrue($result[0]);
    }

    //Password correct
    public function testPasswordCorrect()
    {
        $validator=new Validator();
        $result=$validator->changePassword("123456","abcdef","abcdef",100);
        $this->assertTrue($result[0]);
    }

    //Only confirmation
    public function testOnlyConfirmation()
    {
        $validator=new Validator();
        $result=$validator->changePassword("","","1234",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Current password is required.',$result[1]);
    }

    //Only new and confirmation
    public function testOnlyNewConfirmation()
    {
        $validator=new Validator();
        $result=$validator->changePassword("","123577","1234",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Current password is required.',$result[1]);
    }

    //The old and new
    public function testOnlyNewOld()
    {
        $validator=new Validator();
        $result=$validator->changePassword("1234","123577","",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Cofirmation new password is required.',$result[1]);
    }

    //Only old
    public function testOnlyOld()
    {
        $validator=new Validator();
        $result=$validator->changePassword("1234","","",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('New password is required.',$result[1]);
    }

    //Only new
    public function testOnlyNew()
    {
        $validator=new Validator();
        $result=$validator->changePassword("","1234","",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Current password is required.',$result[1]);
    }

    //Only old and confirmation
    public function testOnlyOldConfirmation()
    {
        $validator=new Validator();
        $result=$validator->changePassword("12224","","asas",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('New password is required.',$result[1]);
    }

     
    //THIS SECTIO SHOWS THE TESTS IF THE THREE VALUES ARE RECEIVED 

    //Short old
    public function testShortOld()
    {
        $validator=new Validator();
        $result=$validator->changePassword("122","add","asas",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Password must be at least 6 characters.',$result[1]);
    }

    //Long old
    public function testLongOld()
    {
        $validator=new Validator();
        $result=$validator->changePassword("12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl","add","asas",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Password must be less than 255 characters.',$result[1]);
    }

    //Short new
    public function testShortNew()
    {
        $validator=new Validator();
        $result=$validator->changePassword("123456","add","asas",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('New password must be at least 6 characters.',$result[1]);
    }

    //Long new
    public function testLongNew()
    {
        $validator=new Validator();
        $result=$validator->changePassword("123456","12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl12234567890asdfghjkasdfghjklasdfghjklasdfghjklasdfghjkl","asas",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('New password must be less than 255 characters.',$result[1]);
    }
    //No matches
    public function testNotMatches()
    {
        $validator=new Validator();
        $result=$validator->changePassword("123456","123456","123457",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Passwords do not match.',$result[1]);
    }

    //Wrong pass
    public function testWrongPass()
    {
        $validator=new Validator();
        $result=$validator->changePassword("123459","123456","123456",999);
        $this->assertFalse($result[0]);
        $this->assertEquals('Wrong password.',$result[1]);
    }






}