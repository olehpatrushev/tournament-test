<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Highlander extends Character
{
    const MOD_VICIOUS = 'Vicious';
    public $hitPoints = 150;

    public function __construct($name = null)
    {
        parent::__construct($name);
        if ($name === self::MOD_VICIOUS) {
            $this->hitPoints *= 0.7;
        }

        EquipmentManager::equipItem($this->equipment, Equipment::GREAT_SWORD);
    }
}