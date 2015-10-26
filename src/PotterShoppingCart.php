<?php

namespace App;

use Illuminate\Support\Collection;

class PotterShoppingCart
{
    /* @var \Illuminate\Support\Collection */
    protected $books;

    public function __construct()
    {
        $this->books = new Collection();
    }

    public function add(Book $book)
    {
        $this->books->push($book);

        return $this;
    }

    public function checkout()
    {
        $groupBookByTitle = $this->books->groupBy(function($item) {
            /* @var $item \App\Book */
            return $item->getTitle();
        });

        $basePrice = 0;
        $extraPrice = 0;
        $discount = $this->calculateDiscount($groupBookByTitle->count());

        foreach($groupBookByTitle as $group) {
            foreach($group as $index => $book) {
                /* @var $book \App\Book */
                if ($index == 0) {
                    $basePrice += $book->getPrice();
                } else {
                    $extraPrice += $book->getPrice();
                }
            }
        }

        $totalPrice = $basePrice * $discount + $extraPrice;

        return $totalPrice;
    }

    private function calculateDiscount($count)
    {
        $discountTable = [
            2 => 0.95,
            3 => 0.9,
            4 => 0.8,
            5 => 0.75,
        ];

        if (!array_key_exists($count, $discountTable)) {
            return 1;
        }

        return $discountTable[$count];
    }
}
