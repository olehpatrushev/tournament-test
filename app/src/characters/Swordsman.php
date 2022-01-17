<?php

namespace Tournament\characters;

use Tournament\EquipmentManager;

class Swordsman extends Character
{
    protected $hitPoints = 100;

    protected function defaultEquiped()
    {
        return [EquipmentManager::SWORD];
    }
}
