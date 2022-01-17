<?php

namespace Tournament\characters;

use Tournament\Equipment;
use Tournament\EquipmentManager;

class Highlander extends Character
{
    protected const MOD_VETERAN = 'Veteran';
    public const DEFAULT_HIT_POINTS = 150;

    public $hitPoints = self::DEFAULT_HIT_POINTS;

    public function __construct($name = null)
    {
        parent::__construct($name);
        EquipmentManager::equipItem($this->equipment, Equipment::WEAPON_GREAT_SWORD);
    }

    public function isVeteran(): bool
    {
        return $this->name === self::MOD_VETERAN;
    }
}