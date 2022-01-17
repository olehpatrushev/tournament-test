<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Highlander extends Character
{
    const MOD_VETERAN = 'Veteran';
    public $hitPoints = 150;

    public function __construct($name = null)
    {
        parent::__construct($name);
        if ($this->isVeteran()) {
            $this->hitPoints *= 0.7;
        }

        EquipmentManager::equipItem($this->equipment, Equipment::WEAPON_GREAT_SWORD);
    }

    public function isVeteran(): boolean
    {
        return $this->name === self::MOD_VETERAN;
    }
}