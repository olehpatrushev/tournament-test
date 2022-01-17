<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Viking extends Character
{
    protected $hitPoints = 120;

    protected function getDefaultEquipment()
    {
        return EquipmentManager::createEquipment(Equipment::AXE);
    }
}
