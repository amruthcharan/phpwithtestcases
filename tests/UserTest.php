<?php

namespace vamsi\phpwithtestcases\tests;

include_once 'User.php';

use PHPUnit\Framework\TestCase;
use vamsi\phpwithtestcases\User;
use InvalidArgumentException;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User(18, 'Vamsi');

        $this->assertSame('Vamsi', $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->getFavourateSubjects());
    }

    public function testGetName()
    {
        $user = new User(18, 'Vamsi');

        $this->assertSame('My name is Vamsi.', $user->getName());
    }

    public function testGetAge()
    {
        $user = new User(18, 'Vamsi');

        $this->assertSame('I am 18 years old.', $user->getAge());
    }

    public function testAddFavoriteSubject()
    {
        $user = new User(18, 'Vamsi');

        $this->assertTrue($user->addFavoriteSubject('Maths'));
        $this->assertSame(['Maths'], $user->getFavourateSubjects());
    }

    public function testRemoveFavoriteSubject()
    {
        $user = new User(18, 'Vamsi');

        $user->addFavoriteSubject('Maths');
        $user->addFavoriteSubject('Science');

        $this->assertTrue($user->removeFavoriteSubject('Science'));
        $this->assertSame(['Maths'], $user->getFavourateSubjects());
    }
}