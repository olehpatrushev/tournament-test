<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Viking extends Character
{
    public $hitPoints = 120;

    public function __construct($name = null)
    {
        parent::__construct($name);

        EquipmentManager::equipItem($this->equipment, Equipment::AXE);
    }
}
