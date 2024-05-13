<?php

namespace Application\Interfaces;

interface BockRepository
{
    public function getBooksForCategory(int $categoryId): array; //of Boock entity
    public function getBooksForFilter(string $filter): array; //of Boock entity
}