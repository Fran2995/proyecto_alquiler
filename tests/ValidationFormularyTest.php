<?php

namespace tests;

use App\ValidationFormulary;
use PHPUnit\Framework\TestCase;

class ValidationFormularyTest extends TestCase
{

    public function testValidNameTrue() {
        $validName = new ValidationFormulary();

        $this->assertTrue($validName->nameValid("Fran"));
    }

    public function testValidNameFalse() {
        $validName = new ValidationFormulary();

        $this->assertFalse($validName->nameValid("Fran33"));
    }

}
