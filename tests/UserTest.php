<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;


class UserTest extends TestCase
{

    public function testRegister()
    {
        $this->json(
            'POST',
            '/register',
            [
                'username' => 'adewalecharles',
                'email' => 'shyprince1@gmail.com',
                'password' => '12345678',
                'password_confirmation' => '12345678'
            ]
        )
            ->seeStatusCode(200);
    }

    public function testLogin()
    {
        $this->json(
            'POST',
            '/login',
            [
                'identity' => 'adewalecharles',
                'password' => '12345678',
            ]
        )
            ->seeStatusCode(200);
    }

    public function testUser()
    {
        $this->json('GET', '/user')
            ->seeStatusCode(200);
    }

    public function testUsers()
    {
        $this->json('GET', '/users')
            ->seeStatusCode(200);
    }

    public function testSingleUser()
    {
        $this->json('GET', '/single-user/1')
            ->seeStatusCode(200);
    }
}
