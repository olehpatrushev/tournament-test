<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Viking extends Character
{
    public const DEFAULT_HIT_POINTS = 120;

    public $hitPoints = self::DEFAULT_HIT_POINTS;

    public function __construct($name = null)
    {
        parent::__construct($name);

        EquipmentManager::equipItem($this->equipment, Equipment::WEAPON_AXE);
    }
}
