<?php
class B{
    //private $a; -> wird durch private A $a ersetzt

    public function __construct(private A $a){
        echo('ctor(B) ');
        $this->a = $a;
    }

    public function bar(){
        $this->a->foo();
        echo('B.bar ');
    }
}