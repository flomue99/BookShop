<?php

namespace Application\Entities;

class User
{
    public function __construct(
        public int    $id,
        public string $username,
        public string $passwordHash,)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

}