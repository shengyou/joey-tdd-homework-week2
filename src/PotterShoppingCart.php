<?php

namespace App;

class PotterShoppingCart
{
    protected $books = [];
    protected $discountTable = [
        2 => 0.95,
        3 => 0.9,
        4 => 0.8,
        5 => 0.75,
    ];

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

        return $totalPrice * $this->calculateDiscount();
    }

    private function calculateDiscount()
    {
        $count = count($this->books);

        if (!array_key_exists($count, $this->discountTable)) {
            return 1;
        }

        return $this->discountTable[$count];
    }
}
