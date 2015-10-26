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

    /**
     * 第一集買了一本，第二集也買了一本，價格應為 100 * 2 * 0.95 = 190
     */
    public function testBuy1EpisodeOneAnd1EpisodeTwoThenShouldPay190()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 190;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 一二三集各買了一本，價格應為 100 * 3 * 0.9 = 270
     */
    public function testBuy1EpisodeOneAnd1EpisodeTwoAnd1EpisodeThreeThenShouldPay270()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 270;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 一二三四集各買了一本，價格應為 100 * 4 * 0.8 = 320
     */
    public function testBuyEpisodeOneToEpisodeFourThenShouldPay320()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 320;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->add(new Book('哈利波特第四集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 一次買了整套，一二三四五集各買了一本，價格應為 100 * 5 * 0.75 = 375
     */
    public function testBuyEachOfEpisodesThenShouldPay375()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 375;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->add(new Book('哈利波特第四集', 100))
                         ->add(new Book('哈利波特第五集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 一二集各買了一本，第三集買了兩本，價格應為 100 * 3 * 0.9 + 100 = 370
     */
    public function testBuy1EpisodeOneAnd1EpisodeTwoAnd2EpisodeThreeThenShouldPay370()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 370;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * 第一集買了一本，第二三集各買了兩本，價格應為 100 * 3 * 0.9 + 100 * 2 * 0.95 = 460
     */
    public function testBuy1EpisodeOneAnd2EpisodeTwoAndThreeThenShouldPay460()
    {
        // Arrange
        $target = new PotterShoppingCart();

        // Act
        $expected = 460;
        $actual = $target->add(new Book('哈利波特第一集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第二集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->add(new Book('哈利波特第三集', 100))
                         ->checkout();

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
