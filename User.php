<?php

namespace vamsi\phpwithtestcases;

use InvalidArgumentException;

class User
{
    public $age;
    public $favorite_subjects = [];
    public $name;


    public function __construct(int $age, string $name)
    {
        $this->age = $age;
        $this->name = $name;
    }

    public function getName(): string
    {
        return "My name is " . $this->name . ".";
    }

    public function getAge(): string
    {
        return "I am " . $this->age . " years old.";
    }

    public function getFavourateSubjects(): array
    {
        return $this->favorite_subjects;
    }

    public function addFavoriteSubject(string $subject): bool
    {
        $this->favorite_subjects[] = $subject;

        return true;
    }

    public function removeFavoriteSubject(string $subject): bool
    {
        if (!in_array($subject, $this->favorite_subjects)) throw new InvalidArgumentException("Unknown subject: " . $subject);

        $this->favorite_subjects = array_diff($this->favorite_subjects, [$subject]);

        return true;
    }
}