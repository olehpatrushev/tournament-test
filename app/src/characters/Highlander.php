<?php

namespace Tournament\characters;

class Highlander extends Character
{
    const MOD_VICIOUS = 'Vicious';
    protected $hitPoints = 150;

    public function __construct($name = null)
    {
        parent::__construct($name);
        if ($name === self::MOD_VICIOUS) {
            $this->hitPoints *= 0.7;
        }
    }
}