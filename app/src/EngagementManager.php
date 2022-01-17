<?php

namespace Tournament;

use Tournament\characters\Character;

class EngagementManager
{
    public static function process(Character $player, Character $enemy)
    {
        $engagement = new Engagement();
        while ($player->hitPoints() > 0 && $enemy->hitPoints() > 0) {

            $engagement->round++;
        }
    }
}