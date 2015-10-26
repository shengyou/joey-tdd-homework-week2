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
