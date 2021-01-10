<?php

namespace lib;

Class SampleObject
{
    public string $varA;
    private string $varB;
    public string $varC;
    
    public function __construct(string $varA, string $varB, string $varC)
    {
        $this->varA = $varA;
        $this->varB = $varB;
        $this->varC = $varC;
    }

    public function setVarB(string $avarB)
    {
        $this->varB = $avarB;
    }
}
