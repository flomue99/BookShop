<?php

namespace Application;

class RemoveBockFromCartCommand
{
    public function __construct(
        private Services\CartService $cartService
    )
    {
    }

    public function execute(int $bookId): void
    {
        //add security checks here!!!!!
        $this->cartService->removeBook($bookId);
    }
}