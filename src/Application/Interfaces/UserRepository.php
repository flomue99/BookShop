<?php

namespace Application\Interfaces;

interface UserRepository
{
    public function getUserForId(int $id): ?\Application\Entities\User;
    public function getUserForUsername(string $username): ?\Application\Entities\User;
}