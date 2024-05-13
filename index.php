<?php
// === register autoloader
//wird immer dann aufgerufen wenn eine bestimmte Klasse nicht gefunden wird
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once($file);
    }
});

$sp = new ServiceProvider;
// register services
// ---APPLICATION

// ---INFRASTRUCTURE

// ---PRESENTATION
$sp->register(\Presentation\MVC\MVC::class, function(){
    //create it with standard parameters
    return new \Presentation\MVC\MVC();
});
$sp->register(\Presentation\Controllers\Home::class);

// TODO: handle request
$sp->resolve(\Presentation\MVC\MVC::class)->handleRequest($sp);
