<?php
use PHPUnit\Framework\TestCase;
//use Calculadora;

final class CalculadoraTest extends TestCase
{
    public function testsuma()
    {
		$calc=new Calculadora();
        $this->assertEquals(10,$calc->suma(4,6));
    }
	
	public function testresta()
    {
		$calc=new Calculadora();
        $this->assertEquals(10,$calc->resta(4,6));
    }

    
}