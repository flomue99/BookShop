<?php

namespace Application;

class BooksQuery
{
    public function __construct(
        private Interfaces\BockRepository $bockRepository,
        private Services\CartService      $cartService)
    {
    }

    public function execute(int $categoryId): array //of Bookdata
    {
        $res = [];
        foreach ($this->bockRepository->getBooksForCategory($categoryId) as $b) {
            $res[] = new BookData(
                $b->getId(),
                $b->getTitle(),
                $b->getAuthor(),
                $b->getPrice(),
                $this->cartService->getCountForBook($b->getId())
            );
        }
        return $res;
    }
}