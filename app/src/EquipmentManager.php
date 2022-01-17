<?php

namespace Tournament;

class EquipmentManager
{
    const SWORD = 'sword';
    const AXE = 'axe';
    const GREAT_SWORD = 'great sword';
    const ARMOR = 'armor';
    const BUCKLER = 'buckler';

    const WEAPONS_CONFIG = [
        self::SWORD => [
            'damage' => 5,
            'twoHanded' => false
        ],
        self::AXE => [
            'damage' => 6,
            'twoHanded' => false
        ],
        self::GREAT_SWORD => [
            'damage' => 12,
            'twoHanded' => true
        ]
    ];
}