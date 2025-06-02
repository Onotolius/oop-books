<?php

namespace App\Controllers;

use App\Models\Book;
use App\Models\Library;
use http\Header;

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
        $this->render('index', $this->library->getAll());
    }

    public function addForm(): void
    {
        $this->render('add', []); // тут просят кинуть через $data данные

        // нужно будет сделать по-другому ф-цию
    }

    public function store(): void
    {
        $param = $_POST;
        $book = new Book($param['title'], $param['author'], $param['year'], $param['genre']);
        $this->add($book);
        header("Location: /");
        exit;
    }

    public function render(string $view, array $data): void
    {
        require __DIR__ . "/../Views/{$view}.php";
    }
}
