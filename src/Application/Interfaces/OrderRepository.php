<?php

namespace Application\Interfaces;

interface OrderRepository
{
    public function createOrder(?int $userId, array $cart, string $creditCardName, array|string $creditCardNumber, ?int $orderId): int;
}