<?php

namespace Infrastructure;

class FakeRepository 
implements 
    \Application\Interfaces\CategoryRepository
{
    private $mockCategories;
    private $mockBooks;
    private $mockUsers;

    public function __construct()
    {
        // create mock data
        $this->mockCategories = [
            [1, 'Mobile & Wireless Computing'],
            [2, 'Functional Programming'],
            [3, 'C / C++'],
            [4, '<< New Publications >>']
        ];

        $this->mockBooks = array(
            array(1, 1, 'Hello, Android:\nIntroducing Google\'s Mobile Development Platform', 'Ed Burnette', 19.97),
            array(2, 1, 'Android Wireless Application Development', 'Shane Conder, Lauren Darcey', 31.22),
            array(5, 1, 'Professional Flash Mobile Development', 'Richard Wagner', 19.90),
            array(7, 1, 'Mobile Web Design For Dummies', 'Janine Warner, David LaFontaine', 16.32),
            array(11, 2, 'Introduction to Functional Programming using Haskell', 'Richard Bird', 74.75),
            // book with title to test scripting attack
            array(12, 2, 'Scripting (Attacks) for Beginners - <script type="text/javascript">alert(\'All your base are belong to us!\');</script>', 'John Doe', 9.99),
            array(14, 2, 'Expert F# (Expert\'s Voice in .NET)', 'Antonio Cisternino, Adam Granicz, Don Syme', 47.64),
            array(16, 3, 'C Programming Language\n(2nd Edition)', 'Brian W. Kernighan, Dennis M. Ritchie', 48.36),
            array(27, 3, 'C++ Primer Plus\n(5th Edition)', 'Stephan Prata', 36.94),
            array(29, 3, 'The C++ Programming Language', 'Bjarne Stroustrup', 67.49)
        );

        $this->mockUsers = array(
            array(1, 'scr4', '$2y$10$0dhe3ngxlmzgZrX6MpSHkeoDQ.dOaceVTomUq/nQXV0vSkFojq.VG')
        );
    }

    public function getCategories() : array{
        $res = [];
        foreach ($this->mockCategories as $c){
            $res[] = new \Application\Entities\Category($c[0], $c[1]); 
        }
        return $res;
    }
    // TODO: implementation
}
