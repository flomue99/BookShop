<?php

namespace Presentation\Controllers;

class Books extends \Presentation\MVC\Controller{
    public function __construct(private \Application\CategoriesQuery $categoriesQuery){
    }

    public function GET_Index(): \Presentation\MVC\ActionResult{
        return $this->view('booklist', [
            'categories' => $this->categoriesQuery->execute()
            // TODO pass categories to view
            // TODO pass books to view
            // ..
        ]);
    }
}