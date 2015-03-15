<?php

namespace bizlunch\test\functionnal\auth;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    public function testHelloWorld()
    {
        $helloWorld = "Hello world";

        $this->assertEquals("Hello world", $helloWorld);
    }

    public function testWithoutData()
    {
        global $bizlunchAPI;

        $r = $bizlunchAPI->post('/auth/login', []);

        $this->assertEquals("Le champs login est requis !", $r['data']['message']);
    }

    public function testBadPassword()
    {
        global $bizlunchAPI;

        $r = $bizlunchAPI->post('/auth/login', ['login' => 'ebuildy@gmail.com', 'password' => 'badpassword']);

        //var_dump($r);die();

        $this->assertEquals("Le champs login est requis !", $r['data']['message']);
    }
}