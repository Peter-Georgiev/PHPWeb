<?php
declare(strict_types=1);

class Book
{
    protected $title;
    protected $author;
    protected $price;

    public function __construct(string $author, string $title, float $price)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setPrice($price);
    }

    protected function setAuthor(string $author)
    {
        $tokens = explode(' ', $author);
        preg_match('/^[a-zA-Z]+$/', trim($tokens[1]), $regex);
        if (count($regex) == 0) {
            exit("Author not valid!");
        }
        $this->author = $author;
    }

    protected function setTitle(string $title)
    {
        if (strlen(trim($title)) < 3) {
            exit("Title not valid!");
        }
        $this->title = $title;
    }

    protected function setPrice(float $price)
    {
        if ($price <= 0) {
            exit("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL .
            $this->price;
    }
}