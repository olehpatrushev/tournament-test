<?php

namespace Tournament;

use Tournament\characters\Character;
use Tournament\characters\Swordsman;

class Engagement
{
    public $round = 1;

    public const EVENT_AXE_BUCKLER_BLOCK = 'axe_buckler_block';
    public const EVENT_BLOW_DELIVERED = 'blow_delivered';

    public const VALUE_AXE_BUCKLER_BLOCKS_COUNT = 'axe_buckler_blocks_count';
    public const VALUE_BLOWS_DELIVERED_COUNT = 'blows_delivered_count';
    public const VALUE_BUCKLER = 'buckler';
    public const VALUE_IS_POISON_ATTACK = 'is_poison_attack';

    public function initCharacterValues(Character $character): void
    {
        $this[$character] = [
            self::VALUE_AXE_BUCKLER_BLOCKS_COUNT => 0,
            self::VALUE_BLOWS_DELIVERED_COUNT => 0,
            self::VALUE_BUCKLER => $character->equipment->buckler,
            self::VALUE_IS_POISON_ATTACK => false
        ];
        if ($character instanceof Swordsman && $character->isVicious()) {
            $this[$character][self::VALUE_IS_POISON_ATTACK] = true;
        }
    }

    public function trigger($eventName, Character $character): void
    {
        switch ($eventName) {
            case self::EVENT_AXE_BUCKLER_BLOCK:
                if (++$this[$character][self::VALUE_AXE_BUCKLER_BLOCKS_COUNT] > 3) {
                    $this[$character][self::VALUE_BUCKLER] = false;
                }
                break;
            case self::EVENT_BLOW_DELIVERED:
                if ($this[$character][self::VALUE_IS_POISON_ATTACK] && ++$this[$character][self::VALUE_BLOWS_DELIVERED_COUNT] > 2) {
                    $this[$character][self::VALUE_IS_POISON_ATTACK] = false;
                }
                break;
        }
    }

    public function getCharacterValue(Character $character, $valueKey)
    {
        return $this[$character][$valueKey];
    }
}