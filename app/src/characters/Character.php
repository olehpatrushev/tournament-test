<?php

namespace Tournament\characters;

use Tournament\EquipmentManager;

abstract class Character
{
    protected $name;

    protected $hitPoints;

    protected $equipment = null;

    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->name = $name;
        }
        $this->equipment = $this->getDefaultEquipment();
    }

    public function hitPoints()
    {
        return $this->hitPoints;
    }

    public function equip($item)
    {
        EquipmentManager::equipItem($this->equipment, $item);
    }

    public function engage(Character $enemy)
    {

    }

    abstract protected function getDefaultEquipment();
}