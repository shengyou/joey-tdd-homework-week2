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

        $discountPercentage = 1.0;
        if (count($this->books) == 2) {
            $discountPercentage = 0.95;
        } else if  (count($this->books) == 3) {
            $discountPercentage = 0.9;
        } else if  (count($this->books) == 4) {
            $discountPercentage = 0.8;
        }

        return $totalPrice * $discountPercentage;
    }
}
