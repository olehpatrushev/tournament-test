<?php

namespace Tournament;

use Tournament\characters\Character;

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
            if (++$i > 30) {
                throw new \Exception('EXCEEDED');
            }
        }
        $player->hitPoints = max($player->hitPoints, 0);
        $enemy->hitPoints = max($enemy->hitPoints, 0);
    }

    protected
    static function engage(Character $attacker, Character $enemy, Engagement $engagement)
    {
        $damage = EquipmentManager::getBaseDamage($attacker->equipment);
        if ($damage) {

        }
    }
}