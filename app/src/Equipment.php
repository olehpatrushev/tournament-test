<?php

namespace Tournament;

class Equipment
{
    const WEAPON_SWORD = 'sword';
    const WEAPON_AXE = 'axe';
    const WEAPON_GREAT_SWORD = 'great sword';
    const ARMOR = 'armor';
    const BUCKLER = 'buckler';

    public $weapon;
    public $buckler = false;
    public $armor = false;

    public function isWeapon($weapon): bool
    {
        return $this->weapon === $weapon;
    }
}