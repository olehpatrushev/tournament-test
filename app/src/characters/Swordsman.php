<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Swordsman extends Character
{
    public $hitPoints = 100;

    public function __construct($name = null)
    {
        parent::__construct($name);

        EquipmentManager::equipItem($this->equipment, Equipment::SWORD);
    }
}
