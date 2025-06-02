<?php

namespace App\Controllers;

use App\Models\Library;

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

    public function delete(int $id)
    {
        $this->library->removeBookById($id);
    }
    public function index(): void
    {
        $data = $this->library->getAll();
        require __DIR__ . "/../views/index.php";
    }
}
