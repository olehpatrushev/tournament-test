<?php

namespace Tournament\characters;

use Tournament\EngagementManager;
use Tournament\Equipment;
use Tournament\EquipmentManager;

abstract class Character
{
    /**
     * @property string $name
     */
    public $name;

    /**
     * @property integer $hitPoints
     */
    public $hitPoints;

    /**
     * @property Equipment $equipment
     */
    public $equipment;

    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->name = $name;
        }
        $this->equipment = new Equipment();
    }

    public function hitPoints()
    {
        return $this->hitPoints;
    }

    public function equip($item)
    {
        EquipmentManager::equipItem($this->equipment, $item);
        return $this;
    }

    public function engage(Character $enemy)
    {
        EngagementManager::process($this, $enemy);
    }

    abstract protected function getDefaultEquipment();
}