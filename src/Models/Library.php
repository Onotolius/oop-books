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

    public function findByAuthor(string $author): array
    {
        echo $this->log("User made search by Author ");
        return $this->db->select("SELECT * FROM books where author = ?", [$author]);
    }

    public function findByGenre(string $genre): array
    {
        echo $this->log("User made search by genre ");
        return $this->db->select("SELECT * FROM books where genre = ?", [$genre]);
    }

    public function findByGenreAndAuthor(string $genre, string $author): array
    {
        echo $this->log("User made search by genre and author");
        return $this->db->select("SELECT * FROM books WHERE genre = ? AND author = ?", [$genre, $author]);
    }

    public function getBookById(int $id): void
    {
        $this->db->select("SELECT * FROM books where id = ?", [$id]);
        echo $this->log("User made search by Id ");
    }

    public function getUniqueAuthors(): array
    {
        $all = $this->db->select("SELECT DISTINCT author FROM books");
        return array_column($all, 'author');
    }

    public function getUniqueGenres(): array
    {
        $all = $this->db->select("SELECT DISTINCT genre FROM books");
        return array_column($all, 'genre');
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
