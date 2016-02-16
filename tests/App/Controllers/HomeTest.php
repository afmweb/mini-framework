<?php
use Controllers\Home;
/**
 * Description of HomeTest
 *
 * @author afm
 */
class HomeTest extends PHPUnit_Framework_TestCase {
    public $home;
    
    public function setUp()
    {
        $this->home = new Home
                ;
    }
    
    public function testaCriacaoInicialDaClasseHome()
    {
        //$home = new Math;
        $this->assertInstanceOf('Controllers\Home', $this->home);
    }
    
   
   
    
}
