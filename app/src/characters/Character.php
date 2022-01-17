<?php

namespace Tournament\characters;

use Tournament\EngagementManager;
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
        return $this;
    }

    public function engage(Character $enemy)
    {
        EngagementManager::process($this, $enemy);
    }

    abstract protected function getDefaultEquipment();
}