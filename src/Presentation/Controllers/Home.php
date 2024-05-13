<?php

namespace Presentation\Controllers; 

class Home extends \Presentation\MVC\Controller
{
    public function GET_Index(): \Presentation\MVC\ActionResult{
        return $this->view('home');
    }
}