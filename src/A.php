<?php
class A{
    private $count;
    public function __construct(){
        echo('ctor(A) ');
        $this->count = 0;
    }

    public function foo(){
        $this->count++;
        echo("A.foo, ($this->count) ");
    }
}