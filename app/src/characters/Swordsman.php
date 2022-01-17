<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Swordsman extends Character
{
    protected $hitPoints = 100;

    protected function getDefaultEquipment()
    {
        return EquipmentManager::createEquipment(Equipment::SWORD);
    }
}
