<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Viking extends Character
{
    public $hitPoints = 120;

    protected function getDefaultEquipment()
    {
        return EquipmentManager::createEquipment(Equipment::AXE);
    }
}
