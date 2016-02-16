<?php
define('URLBASE', 'http://localhost:8080');
use Sys\Core;
/**
 * Description of CoreTest
 *
 * @author afm
 */
class CoreTest extends PHPUnit_Framework_TestCase {
    public $core;
    
    public function setUp()
    {
        $this->core = new Core
                ;
    }
    
    public function testaCriacaoInicialDaClasseCore()
    {
        //$core = new Math;
        $this->assertInstanceOf('Controllers\Core', $this->core);
    }
    
   
   
    
}
