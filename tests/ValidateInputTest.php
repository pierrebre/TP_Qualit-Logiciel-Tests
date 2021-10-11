<?php
require('src/model/User.php');

class ValidateInputTest extends \PHPUnit\Framework\TestCase
{
    public function testValidLength()
    {
        $user = new User();
        $this->assertTrue($user->loginInputIsValid('testemail@gmail.com', 'Password'));
    }
}
