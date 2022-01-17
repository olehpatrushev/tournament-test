<?php

namespace Tournament;

class EquipmentManager
{
    const WEAPONS_CONFIG = [
        Equipment::SWORD => [
            'damage' => 5,
            'twoHanded' => false
        ],
        Equipment::AXE => [
            'damage' => 6,
            'twoHanded' => false
        ],
        Equipment::GREAT_SWORD => [
            'damage' => 12,
            'twoHanded' => true
        ]
    ];

    public static function createEquipment($weapon, $buckler = false, $armor = false)
    {
        $equipment = new Equipment();
        $equipment->weapon = $weapon;
        $equipment->buckler = $buckler;
        $equipment->armor = $armor;
        return $equipment;
    }

    public static function equipItem(Equipment $equipment, $item)
    {
        if (array_key_exists($item, self::WEAPONS_CONFIG)) {
            $equipment->weapon = $item;
        }
        if ($item === Equipment::BUCKLER) {
            $equipment->buckler = true;
        }
        if ($item === Equipment::ARMOR) {
            $equipment->armor = true;
        }
    }
}