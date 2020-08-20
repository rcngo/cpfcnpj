<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use rcngo\cpfcnpj\cpfcnpj;

class CpfCnpjTest extends TestCase
{
    public function testRemoveMaskTest()
    {
        $cpfCnpj = new CpfCnpj();

        $this->assertIsString($cpfCnpj->removeMaskCpfOrCnpj('000.000.000-00'));
        $this->assertEquals(strlen($cpfCnpj->removeMaskCpfOrCnpj('000.000.000-00')), 11);
        $this->assertEquals(strlen($cpfCnpj->removeMaskCpfOrCnpj('00.000.000/0000-00')), 14);
    }

    public function testValidateCpfTest()
    {
        $cpfCnpj = new CpfCnpj();
        $this->assertIsBool($cpfCnpj->cpfValidate('000.000.000-00'), false);
    }

    public function testValidateCnpjTest()
    {
        $cpfCnpj = new CpfCnpj();
        $this->assertIsBool($cpfCnpj->cnpjValidate('00.000.000/0000-00'), false);
    }
}
