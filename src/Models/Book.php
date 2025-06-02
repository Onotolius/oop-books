<?php

namespace App\Models;
class Book
{
    private string $title;

    private string $author;
    private string $year;
    private string $genre;
    private int $id;
    private static int $nextId = 0;

    /**
     * @param string $title
     * @param string $author
     * @param string $year
     * @param string $genre
     */
    public function __construct(string $title, string $author, string $year, string $genre)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->genre = $genre;
        $this->id = self::$nextId++;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInfo(): string
    {
        return "This is: {$this->getTitle()} by {$this->getAuthor()} written in {$this->getYear()}, genre: {$this->getGenre()} </br>";
    }
}
