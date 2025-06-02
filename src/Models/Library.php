<?php

namespace App\Models;
use App\Core\Logger;
use App\Models\Book;
class Library
{
    private array $books;
    use Logger;
    public function __construct()
    {
        $this->books = [];
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
        $this->log("Book {$book->getTitle()} was added to the library}");
    }

    public function removeBookById(int $id): void
    {
        foreach ($this->books as $key => $book) {
           if($book->getId() == $id) {
               unset($this->books[$key]);
               echo $this->log("Book: {$book->getTitle()} was deleted by Id");
               return;
           }
        }
    }
    public function listBooks():void
    {
        foreach ($this->books as $book) {
            echo $book->getInfo();
        }
        echo $this->log("User request all books");
    }
    public function findByAuthor(string $author):void
    {
        foreach ($this->books as $key => $book) {
            if(mb_strtolower($book->getAuthor()) === mb_strtolower($author)) {
                echo $book->getInfo();
            }
        }
        echo $this->log("User made search by Author ");
    }

    public function findByGenre(string $genre): void
    {
        foreach ($this->books as $key => $book) {
            if(mb_strtolower($book->getGenre()) === mb_strtolower($genre)) {
                echo $book->getInfo();
            }
        }
        echo $this->log("User made search by genre ");
    }

    public function getBookById(int $id): void
    {
        foreach ($this->books as $key => $book) {
            if ($book->getId() === $id) {
                echo $book->getInfo();
            }
        }
        echo $this->log("User made search by Id ");
    }

    public function saveToJson(Book $book)
    {
       return json_encode($book); // Пока не в кусре
    }

    public function getAll(): array
    {
        $books = [];
        foreach($this->books as $key => $book){
            $books[] = [
                "id" => $book->getId(),
                "title" => $book->getTitle(),
                "author" => $book->getAuthor(),
                "genre" => $book->getGenre(),
                "year" => $book->getYear(),
            ];
        }
        return $books;
    }
}
