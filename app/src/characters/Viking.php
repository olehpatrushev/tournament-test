<?php

namespace Tournament\characters;

use Tournament\EquipmentManager;

class Viking extends Character
{
    protected $hitPoints = 120;

    protected function defaultEquiped()
    {
        return EquipmentManager::createEquipment(EquipmentManager::SWORD);
    }
}
