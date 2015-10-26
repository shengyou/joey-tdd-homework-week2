<?php

namespace App;

use Illuminate\Support\Collection;

class PotterShoppingCart
{
    /* @var \Illuminate\Support\Collection */
    protected $books;

    public function __construct()
    {
        $this->books = collect();
    }

    public function add(Book $book)
    {
        $this->books->push($book);

        return $this;
    }

    public function checkout()
    {
        $groupBooksByTitle = $this->books->groupBy(function($item) {
            /* @var $item Book */
            return $item->getTitle();
        });

        $groupBooksByDiff = [];

        foreach($groupBooksByTitle as $group) {
            foreach($group as $index => $book) {
                $groupBooksByDiff[$index][] = $book;
            }
        }

        $totalPrice = 0;
        foreach($groupBooksByDiff as $group) {
            /* @var $group Collection */
            $partialPrice = 0;
            foreach($group as $book) {
                /* @var $book Book */
                $partialPrice += $book->getPrice();
            }

            $totalPrice += $partialPrice * $this->calculateDiscount(count($group));
        }

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
