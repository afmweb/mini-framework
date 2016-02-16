<?php

use Controllers\Math;

class MathTest extends PHPUnit_Framework_TestCase
{
    public $math;
    
    public function setUp()
    {
        $this->math = new Math;
    }
    
    public function testaCriacaoInicialDaClasseMath()
    {
        $math = new Math;
        $this->assertInstanceOf('Controllers\Math', $math);
    }
    
    public function testeCalculoDoMetodoAdd()
    {
        $this->assertEquals(10, $this->math->add(5, 5));
    }
    
    public function testeRetornoTipoInteiroEmAdd()
    {
        $this->assertInternalType('int', $this->math->add(1, 2));
    }
    
    public function testeCalculoDoMetodoSub()
    {
        $this->assertEquals(0, $this->math->sub(5, 5));
    }
    
    public function testeRetornoTipoInteiroEmSub()
    {
        $this->assertInternalType('int', $this->math->sub(10, 4));
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 100
     */
    public function testeExceptionInvalidParameter()
    {
        $this->math->add('teste', 2);
    }
}
