<?php

namespace Tournament;

class Character
{
    protected $name;

    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->name = $name;
        }
    }

    public function hitPoints()
    {

    }

    public function equip()
    {

    }
}