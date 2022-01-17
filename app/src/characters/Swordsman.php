<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Swordsman extends Character
{
    protected const MOD_VICIOUS = 'Vicious';
    public const DEFAULT_HIT_POINTS = 100;

    public $hitPoints = self::DEFAULT_HIT_POINTS;

    public function __construct($name = null)
    {
        parent::__construct($name);

        EquipmentManager::equipItem($this->equipment, Equipment::WEAPON_SWORD);
    }

    public function isVicious(): bool
    {
        return $this->name === self::MOD_VICIOUS;
    }
}
