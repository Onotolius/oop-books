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
$myLib->findByAuthor('Достоевский'); // Работает четко и без лишних выводов ID
echo "</br>";
$myLib->findByGenre('роман'); // Работает отлично
echo "</br>";
$myLib->listBooks(); // само собой
echo "</br>";
$myLib->getBookById(3); // четко работает
echo "</br>";
$myLib->removeBookById(3); // тоже гуд
echo "</br>";
$myLib->listBooks(); // само собой
