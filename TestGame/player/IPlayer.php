<?php

namespace TestGame\player;

use TestGame\unit\IUnit;

interface IPlayer
{
    /**
     * @param IUnit $unit
     * @return mixed
     */
    public function addUnit(IUnit $unit);

    /**
     * @param $unitId
     * @return IUnit
     */
    public function getUnit($unitId);

    /**
     * @return mixed
     */
    public function getUnits();

    /**
     * @return mixed
     */
    public function getName();
}