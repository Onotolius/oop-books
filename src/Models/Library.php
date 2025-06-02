<?php

namespace App\Models;

use App\Core\Logger;
use App\Models\Book;
use App\Core\DB;

class Library
{
    private DB $db;
    use Logger;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function addBook(Book $book): void
    {
        $this->db->insert("INSERT INTO books (title, author, year, genre) VALUES (:title, :author, :year, :genre)", [
            "title" => $book->getTitle(),
            "author" => $book->getAuthor(),
            "year" => $book->getYear(),
            "genre" => $book->getGenre(),
        ]);
        $this->log("Book {$book->getTitle()} was added to the library}");
    }

    public function removeBookById(int $id): void
    {
        $this->db->query("DELETE FROM books WHERE id = ?", [
            $id
        ]);
        echo $this->log("Book  was deleted by Id");
    }

    public function listBooks(): void
    {
        $this->db->select("SELECT * FROM books");
        echo $this->log("User request all books");
    }

    public function findByAuthor(string $author): void
    {
        $this->db->select("SELECT * FROM books where author = ?", [$author]);
        echo $this->log("User made search by Author ");
    }

    public function findByGenre(string $genre): void
    {
        $this->db->select("SELECT * FROM books where genre = ?", [$genre]);
        echo $this->log("User made search by genre ");
    }

    public function getBookById(int $id): void
    {
        $this->db->select("SELECT * FROM books where id = ?", [$id]);
        echo $this->log("User made search by Id ");
    }

    public function saveToJson(Book $book)
    {
        return json_encode($book); // Пока не в кусре
    }

    public function getAll(): array
    {
        return $this->db->select("SELECT * FROM books");
    }
}
