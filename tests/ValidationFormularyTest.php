<?php

namespace tests;

use App\ValidationFormulary;
use PHPUnit\Framework\TestCase;

class ValidationFormularyTest extends TestCase
{

    public function testValidNameTrue() {
        $validationFormulary = new ValidationFormulary();

        $this->assertTrue($validationFormulary->nameValid("Fran"));
    }

    public function testValidNameWhitNumbers() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->nameValid("Fran33"));
    }

    public function testValidSurnameTrue() {
        $validationFormulary = new ValidationFormulary();

        $this->assertTrue($validationFormulary->nameValid("Hernández"));
    }

    public function testValidSurnameEmpty() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->nameValid(""));
    }

    public function testValidEmailTrue() {
        $validationFormulary = new ValidationFormulary();

        $this->assertTrue($validationFormulary->emailValid("fmalaga33@hotmail.com"));
    }

    public function testValidEmailWithoutCom() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->emailValid("fmalaga33@hotmail.es"));
    }

    public function testValidPhoneTrue() {
        $validationFormulary = new ValidationFormulary();

        $this->assertTrue($validationFormulary->telephoneValid("123456789"));
    }

    public function testValidPhoneLessThan9Numbers() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->telephoneValid("12345678"));
    }

    public function testValidPhoneWhitLetter() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->telephoneValid("12345678a"));
    }

    public function testValidPhoneGreaterThan9Numbers() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->telephoneValid("12345678912"));
    }

    public function testValidPasswordsTrue() {
        $validationFormulary = new ValidationFormulary();

        $this->assertTrue($validationFormulary->validPasswords("miC0ntr4senia", "miC0ntr4senia"));
    }

    public function testValidPasswordsLessThan4Characters() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->validPasswords("r1s", "r1s"));
    }

    public function testValidPasswordsWhitDifferentPasswords() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->validPasswords("miC0ntr4senia", "456fasfrasd"));
    }

    public function testValidPasswordsWhitAEmptyPassword() {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->validPasswords("", "456fasfrasd"));
    }

    public function emailUserExist(): void
    {
        $validationFormulary = new ValidationFormulary();

        $this->assertFalse($validationFormulary->validPasswords("", "456fasfrasd"));
    }

}
