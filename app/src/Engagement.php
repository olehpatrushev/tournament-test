<?php

namespace Tournament;

use Tournament\characters\Character;

class Engagement
{
    public $round = 1;

    public function initCharacterValues(Character $character)
    {
        $this[$character] = [
            'bucklerBlocksCount' => 0
        ];
    }
}