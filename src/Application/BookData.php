<?php

namespace Application;

readonly class BookData
{
    //has to be set in the constructor
    public bool $isInCart;
    public function __construct(
        public int    $id,
        public string $title,
        public string $author,
        public int    $price,
        public int $cartCount)
    {
        $this->isInCart = $cartCount > 0;
    }
}