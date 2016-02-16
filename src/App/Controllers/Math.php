<?php

namespace Controllers;

class Math
{
    public function add($a, $b)
    {
        if (!is_numeric($a)) {
            throw new \InvalidArgumentException('Valor de A não é numero', 100);
        }
        return $a + $b;
    }
    
     public function sub($a, $b)
    {
        return $a - $b;
    }
}

