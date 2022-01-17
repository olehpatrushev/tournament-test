<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Swordsman extends Character
{
    public $hitPoints = 100;

    protected function getDefaultEquipment()
    {
        $equipment = new Equipment();
        EquipmentManager::equipItem($equipment, Equipment::GREAT_SWORD);
        return $equipment;
    }
}
