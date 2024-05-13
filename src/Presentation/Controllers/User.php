<?php

namespace Presentation\Controllers;

class User extends \Presentation\MVC\Controller
{

    public function __construct(
        private \Application\SignInCommand     $signInCommand,
        private \Application\SignOutCommand    $signOutCommand,
        private \Application\SignedInUserQuery $signedInUserQuery
    )
    {
    }

    public function GET_LogIn(): \Presentation\MVC\ActionResult
    {
        return $this->view('login',[
            'userName' => ''
        ]);
    }

    public function POST_LogIn(): \Presentation\MVC\ActionResult
    {
        $ok = $this->signInCommand->execute($this->getParam('un'), $this->getParam('pwd'));
        if (!$ok) {
          return $this->view('login',[
              'userName' => $this->getParam('un')
          ]);
        }

        //TODO also can add ctx to get back where we came from
        return $this->redirect('Home', 'Index');

    }

    public function POST_LogOut(): \Presentation\MVC\ActionResult
    {
        $this->signOutCommand->execute();
        return $this->redirect('Home', 'Index');
    }

}