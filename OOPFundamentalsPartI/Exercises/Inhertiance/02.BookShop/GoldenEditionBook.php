<?php
declare(strict_types=1);

class GoldenEditionBook extends Book
{
    public function __construct(string $author, string $title, float $price)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setPrice($price * 1.3);
    }
}