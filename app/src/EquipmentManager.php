<?php

namespace Tournament;

class EquipmentManager
{
    const WEAPONS_CONFIG = [
        Equipment::WEAPON_SWORD => [
            'damage' => 5,
            'twoHanded' => false
        ],
        Equipment::WEAPON_AXE => [
            'damage' => 6,
            'twoHanded' => false
        ],
        Equipment::WEAPON_GREAT_SWORD => [
            'damage' => 12,
            'twoHanded' => true
        ]
    ];

    public static function equipItem(Equipment $equipment, $item): void
    {
        switch (true) {
            case array_key_exists($item, self::WEAPONS_CONFIG):
                $equipment->weapon = $item;
                break;
            case $item === Equipment::BUCKLER:
                $equipment->buckler = true;
                break;
            case $item === Equipment::ARMOR:
                $equipment->armor = true;
                break;
            default:
                throw new \Exception("Cannot recognize item $item");
        }
    }

    public static function getBaseDamage(Equipment $equipment): int
    {
        return self::WEAPONS_CONFIG[$equipment->weapon]['damage'];
    }

    public static function isTwoHandedWeapon(Equipment $equipment): bool
    {
        return self::WEAPONS_CONFIG[$equipment->weapon]['twoHanded'];
    }
}