<?php

namespace Application;

class CategoriesQuery
{
    public function __construct(private Interfaces\CategoryRepository $categorieRepository)
    {
    }

    public function execute(): array
    {
        $res = [];
        foreach ($this->categorieRepository->getCategories() as $c) {
            $res[] = new CategoryData($c->getId(), $c->getName());
        }
        return $res;
    }
}