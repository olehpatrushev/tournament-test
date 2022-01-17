<?php

namespace Tournament;

use Tournament\characters\Character;

class Engagement
{
    public $round = 1;

    public function initCharacterValues(Character $character)
    {
        $this[$character] = [
            'bucklerBlocks' => 0,
            'attacksCount' => 0
        ];
    }
}