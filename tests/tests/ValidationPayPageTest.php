<?php

namespace tests;

use App\ValidationPayPage;
use PHPUnit\Framework\TestCase;

class ValidationPayPageTest extends TestCase
{

    public function testValidNumberOfCardWhitANumberMore() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validNumberOfCard("8794-4562-87945-4563"));
    }

    public function testValidNumberOfCardWhitACorrectNumber() {
        $validationPayPage = new ValidationPayPage();

        $this->assertTrue($validationPayPage->validNumberOfCard("8794-4562-8794-4563"));
    }

    public function testValidNumberOfCardWithoutAScript() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validNumberOfCard("8794-4562-879454563"));
    }

    public function testValidNumberOfCardWhitALetter() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validNumberOfCard("8794-4562-8794g-4563"));
    }

    public function testValidNumberEmpty() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validNumberOfCard(""));
    }

    public function testValidExpirationDateEmpty() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validExpirationDate(""));
    }

    public function testValidExpirationDateWithoutScript() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validExpirationDate("1212"));
    }

    public function testValidExpirationDateWhit5Numbers() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validExpirationDate("122-45"));
    }

    public function testValidExpirationDateWhitACorrectFormat() {
        $validationPayPage = new ValidationPayPage();

        $this->assertTrue($validationPayPage->validExpirationDate("02-07"));
    }

    public function testValidCvvEmpty() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validCvv(""));
    }

    public function testValidCvvWhitACorrectNumber() {
        $validationPayPage = new ValidationPayPage();

        $this->assertTrue($validationPayPage->validCvv("378"));
    }

    public function testValidCvvWhitANumberMore() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validCvv("3783"));
    }

    public function testValidCvvWhitALetter() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validCvv("37t"));
    }

    public function testValidTitularNameEmpty() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validTitularName(""));
    }

    public function testValidTitularNameWhitAName() {
        $validationPayPage = new ValidationPayPage();

        $this->assertTrue($validationPayPage->validTitularName("Francisco Hernández"));
    }

    public function testValidTitularNameWhitANumber() {
        $validationPayPage = new ValidationPayPage();

        $this->assertFalse($validationPayPage->validTitularName("Fr4ncisco Hernández"));
    }

}