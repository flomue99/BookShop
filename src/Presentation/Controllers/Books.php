<?php

namespace Presentation\Controllers;

class Books extends \Presentation\MVC\Controller
{
    public function __construct(private \Application\CategoriesQuery $categoriesQuery,
                                private \Application\BooksQuery      $booksQuery,
                                private \Application\BookSearchQuery $bookSearchQuery,)
    {
    }

    public function GET_Index(): \Presentation\MVC\ActionResult
    {
        return $this->view('booklist', [
            'categories' => $this->categoriesQuery->execute(),
            'selectedCategoryId' => $this->tryGetParam('cid', $cid) ? $cid : null,
            'books' => $this->tryGetParam('cid', $cid) ? $this->booksQuery->execute($cid) : null,
            'context' => $this->getRequestUri(),
        ]);
    }

    public function GET_Search(): \Presentation\MVC\ActionResult
    {
        return $this->view('bookSearch', [
            'filter'=> $this->tryGetParam('f', $filter) ? $filter : '',
            'books' => $this->tryGetParam('f', $filter) ? $this->bookSearchQuery->execute($filter) : null,
            'context' => $this->getRequestUri(),
        ]);
    }
}