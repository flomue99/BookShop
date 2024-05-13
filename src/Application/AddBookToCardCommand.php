<?php

namespace Application;

class AddBookToCardCommand
{
    public function __construct(
        private Services\CartService $cartService
    )
    {
    }

    public function execute(int $bookId): void
    {
        //add security checks here!!!!!
        $this->cartService->addBook($bookId);
    }
}