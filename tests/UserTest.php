<?php

namespace vamsi\phpwithtestcases\tests;

include_once 'User.php';

use PHPUnit\Framework\TestCase;
use vamsi\phpwithtestcases\User;

final class UserTest extends TestCase
{
    public function testClassConstructor()
    {
        $user = new User(18, 'Vamsi');

        $this->assertSame('Vamsi', $user->name);
        $this->assertSame(18, $user->age);
        $this->assertEmpty($user->favorite_subjects);
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
        $this->assertSame(['Maths'], $user->favorite_subjects);
    }

    public function testRemoveFavoriteSubject()
    {
        $user = new User(18, 'Vamsi');

        $user->addFavoriteSubject('Maths');
        $user->addFavoriteSubject('Science');

        $this->assertTrue($user->removeFavoriteSubject('Maths'));
        $this->assertSame(['Science'], $user->favorite_subjects);
    }

    public function testRemoveFavoriteSubjectException()
    {
        $this->expectException(InvalidArgumentException::class);

        $user = new User(18, 'Vamsi');

        $user->addFavoriteSubject('Maths');
        $user->addFavoriteSubject('Science');

        $user->removeFavoriteSubject('Physics');
    }

    public function testRemoveFavoriteSubjectExceptionMessage()
    {
        $this->expectExceptionMessage('Unknown subject: Physics');

        $user = new User(18, 'Vamsi');

        $user->addFavoriteSubject('Maths');
        $user->addFavoriteSubject('Science');

        $user->removeFavoriteSubject('Physics');
    }

    public function testRemoveFavoriteSubjectExceptionCode()
    {
        $this->expectExceptionCode(0);

        $user = new User(18, 'Vamsi');

        $user->addFavoriteSubject('Maths');
        $user->addFavoriteSubject('Science');

        $user->removeFavoriteSubject('Physics');
    }
}