<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Library;
use http\Header;
use App\Controllers\ErrorController;

class LibraryController
{
    private Library $library;

    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    public function add(Book $book)
    {
        $this->library->addBook($book);
    }

    public function delete(): void
    {
        $id = $_GET["id"];
        $this->library->removeBookById($id);
        header("Location: /");
        exit;
    }

    public function index(): void
    {
        $author = $_GET['author'] ?? '';
        $genre = $_GET['genre'] ?? '';
        if ($author && $genre) {
            $data = $this->library->findByGenreAndAuthor($genre, $author);
        } elseif ($author) {
            $data = $this->library->findByAuthor($author);
        } elseif ($genre) {
            $data = $this->library->findByGenre($genre);
        } else {
            $data = $this->library->getAll();
        }
        $this->render('index', [
            "books" => $data,
            "authors" => $this->library->getUniqueAuthors(),
            "genres" => $this->library->getUniqueGenres(),
        ]);
    }

    public function addForm(): void
    {
        $this->render('add', []); // тут просят кинуть через $data данные

        // нужно будет сделать по-другому ф-цию
    }

    public function store(): void
    {
        $title = trim(htmlspecialchars($_POST['title'])) ?? '';
        $author = trim(htmlspecialchars($_POST['author'])) ?? '';
        $genre = trim(htmlspecialchars($_POST['genre'])) ?? '';
        if ($title === "" || $author === "" || $genre === "") {
            http_response_code(422);
            exit;
        } else {
            $book = new Book($title, $author, $_POST['year'], $genre);
            $this->add($book);
            header("Location: /");
            exit;
        }

    }

    public function render(string $view, array $data): void
    {
        require __DIR__ . "/../Views/{$view}.php";
    }
}
