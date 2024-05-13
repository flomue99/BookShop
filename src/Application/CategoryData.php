<?php

namespace Application;

// used as DTO for the view
readonly class CategoryData{
    public function __construct(public int $id, public string $name){  
    }
}