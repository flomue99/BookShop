<?php

namespace Application;

class CheckOutCommand
{
    //could return a combination of these flags
    const ERROR_NOT_AUTHENTICATED = 0x01;
    const ERROR_EMPTY_CART = 0x02;
    const ERROR_INVALID_CREDIT_CARD_NAME = 0x04;
    const ERROR_INVALID_CREDIT_CARD_NUMBER = 0x08;

    public function __construct(
        private Services\CartService           $cartService,
        private Services\AuthenticationService $authenticationService,
        private Interfaces\OrderRepository     $orderRepository
    )
    {
    }


    public function execute(string $creditCardName, string $creditCardNumber, ?int $orderId): int
    {
        $sanitizeCardName = trim($creditCardName);
        $creditCardNumber = str_replace(' ', '', $creditCardNumber);

        $errors = 0;
        //check if user is authenticated
        $userId = $this->authenticationService->getUserId();
        if ($userId === null) {
            $errors |= self::ERROR_NOT_AUTHENTICATED;
        }
        //check for items in cart
        $cart = $this->cartService->getAllBooksWithCount();
        if (sizeof($cart) === 0) {
            $errors |= self::ERROR_EMPTY_CART;
        }

        //check for valid credit card name -TODO delegate to PaymentService IRL
        if (strlen($sanitizeCardName) == 0) {
            $errors |= self::ERROR_INVALID_CREDIT_CARD_NAME;
        }

        if (strlen($creditCardNumber) != 16 || !ctype_digit($creditCardNumber)) {
            $errors |= self::ERROR_INVALID_CREDIT_CARD_NUMBER;
        }

        if($errors){
            $orderId = null;
            return $errors;
        }

        $orderId = $this->orderRepository->createOrder($userId, $cart, $creditCardName, $creditCardNumber, $orderId);
        //TODO make payment
        $this->cartService->clearCart();


        return 0;
    }

}