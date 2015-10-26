<?php

namespace App\Tests;

use App\Book;
use App\PotterShoppingCart;

class PotterShoppingCartTest extends \PHPUnit_Framework_TestCase
{
    public function testBuy1EpisodeOneThenShouldPay100()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 100;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

}
