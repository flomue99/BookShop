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
$sp->register(\Application\CategoriesQuery::class);
$sp->register(\Application\BooksQuery::class);
$sp->register(\Application\BookSearchQuery::class);
$sp->register(\Application\AddBookToCardCommand::class);
$sp->register(\Application\RemoveBockFromCartCommand::class);
$sp->register(\Application\SignInCommand::class);
$sp->register(\Application\SignOutCommand::class);
$sp->register(\Application\SignedInUserQuery::class);
$sp->register(\Application\CartSizeQuery::class);
$sp->register(\Application\CheckOutCommand::class);
// ---Helper classes
$sp->register(\Application\Services\CartService::class);
$sp->register(\Application\Services\AuthenticationService::class);
// ---INFRASTRUCTURE
$sp->register(\Application\Interfaces\CategoryRepository::class, \Infrastructure\FakeRepository::class);
$sp->register(\Application\Interfaces\BockRepository::class, \Infrastructure\FakeRepository::class);
$sp->register(\Application\Interfaces\UserRepository::class, \Infrastructure\FakeRepository::class);
$sp->register(\Application\Interfaces\OrderRepository::class, \Infrastructure\FakeRepository::class);
$sp->register(\Infrastructure\FakeRepository::class);
$sp->register(\Application\Interfaces\Session::class, \Infrastructure\Session::class);
$sp->register(\Infrastructure\Session::class, isSingleton: true);
// ---PRESENTATION
$sp->register(\Presentation\MVC\MVC::class, function(){
    //create it with standard parameters
    return new \Presentation\MVC\MVC();
});
$sp->register(\Presentation\Controllers\Home::class);
$sp->register(\Presentation\Controllers\Books::class);
$sp->register(\Presentation\Controllers\Cart::class);
$sp->register(\Presentation\Controllers\User::class);

// TODO: handle request
$sp->resolve(\Presentation\MVC\MVC::class)->handleRequest($sp);
