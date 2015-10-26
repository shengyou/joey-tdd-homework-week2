<?php

namespace App;

class PotterShoppingCart
{
    protected $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    public function checkout()
    {
        $totalPrice = 0;

        foreach($this->books as $book) {
            /* @var $book \App\Book */
            $totalPrice += $book->getPrice();
        }

        return $totalPrice;
    }
}
