<?php


namespace TestGame\player;


use TestGame\unit\IUnit;

class Player implements IPlayer {
    /**
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $units = [];

    /**
     * Player constructor.
     * @param $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    public function addUnit(IUnit $unit)
    {
        $unit->setPlayer($this);
        $this->units[$unit->getId()] = $unit;
    }

    /**
     * @param $unitId
     * @return IUnit|null
     */
    public function getUnit($unitId)
    {
        return array_key_exists($unitId, $this->units) ? $this->units[$unitId] : null;
    }

    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}