<?php

namespace Tournament;

use Tournament\characters\Character;
use Tournament\characters\Highlander;
use Tournament\characters\Swordsman;

class EngagementManager
{
    public static function process(Character $player, Character $enemy)
    {
        $engagement = new Engagement();
        $engagement->initCharacterValues($player);
        $engagement->initCharacterValues($enemy);
        $i = 0;
        while (true) {
            self::engage($player, $enemy, $engagement);
            if ($player->hitPoints() > 0 && $enemy->hitPoints() > 0) {
                self::engage($enemy, $player, $engagement);
            } else {
                break;
            }
            if ($player->hitPoints() > 0 && $enemy->hitPoints() > 0) {
                $engagement->round++;
            } else {
                break;
            }
            if (++$i > 100) {
                throw new \Exception('EXCEEDED');
            }
        }
        $player->hitPoints = max($player->hitPoints, 0);
        $enemy->hitPoints = max($enemy->hitPoints, 0);
    }

    protected
    static function engage(Character $attacker, Character $enemy, Engagement $engagement): void
    {
        if ($engagement->round % 3 === 0 && $attacker->equipment->isWeapon(Equipment::WEAPON_GREAT_SWORD)) {
            return;
        }
        if ($engagement->getCharacterValue($enemy, Engagement::VALUE_BUCKLER) && $engagement->round % 2 === 1 && !EquipmentManager::isTwoHandedWeapon($enemy->equipment)) {
            if ($attacker->equipment->isWeapon(Equipment::WEAPON_AXE)) {
                $engagement->trigger(Engagement::EVENT_AXE_BUCKLER_BLOCK, $enemy);
            }
            if ($engagement->getCharacterValue($enemy, Engagement::VALUE_BUCKLER)) {
                return;
            }
        }
        $engagement->trigger(Engagement::EVENT_BLOW_DELIVERED, $attacker);
        $damage = EquipmentManager::getBaseDamage($attacker->equipment);
        if ($engagement->getCharacterValue($attacker, Engagement::VALUE_IS_POISON_ATTACK)) {
            $damage += 20;
        }
        if ($enemy->equipment->armor === true) {
            $damage -= 3;
        }
        if ($attacker->equipment->armor === true) {
            $damage -= 1;
        }
        if ($attacker instanceof Highlander && $attacker->isVeteran() && $attacker->hitPoints < Highlander::DEFAULT_HIT_POINTS * 0.3) {
            $damage *= 2;
        }

        $enemy->hitPoints -= $damage;
    }
}