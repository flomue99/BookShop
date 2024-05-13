<?php

namespace Presentation\Controllers;

class Cart extends \Presentation\MVC\Controller
{
    public function __construct(
        private \Application\AddBookToCardCommand      $addBookToCardCommand,
        private \Application\RemoveBockFromCartCommand $removeBockFromCartCommand,
    )
    {
    }

    public function POST_Add(): \Presentation\MVC\ActionResult
    {
        $this->addBookToCardCommand->execute($this->GetParam('bid'));
        return $this->redirectToUri($this->getParam('ctx'));
       // return $this->redirect('Home', 'Index'); //TODO
    }

    public function POST_Remove(): \Presentation\MVC\ActionResult
    {
        $this->removeBockFromCartCommand->execute($this->GetParam('bid'));
        return $this->redirectToUri($this->getParam('ctx'));
       // return $this->redirect('Home', 'Index'); //TODO
    }
}