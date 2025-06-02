<?php

declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";
use App\Models\Book;
use App\Models\Library;

$book1 = new Book('Мертвые души', 'Гоголь', '1849', 'Роман');
$book2 = new Book('Братья Карамазовы', 'Достоевский', '1890', 'Роман');
$book3 = new Book('Crime and Punishment', 'Достоевский', '1890', 'Роман');
$book4 = new Book('War and Peace', 'Tolstoy', '1850', 'Роман');
$book5 = new Book('Clean Code', 'R. Martin', '1980', 'science');
$myLib = new Library();
$myLib->addBook($book1);
$myLib->addBook($book2);
$myLib->addBook($book3);
$myLib->addBook($book4);
$myLib->addBook($book5);
$controller = new \App\Controllers\LibraryController($myLib);
$controller->index();
