<?php

namespace Tournament;

use Tournament\characters\Character;

class Engagement
{
    public $round = 1;

    public const EVENT_AXE_BUCKLER_BLOCK = 'axe_buckler_block';

    public function initCharacterValues(Character $character)
    {
        $this[$character] = [
            'axeBucklerBlocksCount' => 0
        ];
    }

    public function trigger($eventName, Character $character)
    {
        switch ($eventName) {
            case self::EVENT_AXE_BUCKLER_BLOCK:
                if (++$this[$character]['axeBucklerBlocksCount'] > 3) {
                    $character->equipment->buckler = false;
                }
                break;
        }
    }
}