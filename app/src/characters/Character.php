<?php

namespace Tournament\characters;

abstract class Character
{
    protected $name;

    protected $hitPoints;

    protected $equiped = [];

    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->name = $name;
        }
    }

    public function hitPoints()
    {
        return $this->hitPoints;
    }

    public function equip($item)
    {
        return $this->equiped[] = $item;
    }

    public function engage(Character $enemy)
    {

    }

    abstract protected function defaultEquiped();
}