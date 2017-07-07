<?php


namespace TestGame\unit;


use TestGame\view\ViewBog;
use TestGame\view\ViewMountain;
use TestGame\view\ViewPlain;
use TestGame\view\ViewWater;

class UnitAirplane extends AUnit
{
    public function setMoveRules()
    {
        $this->moveRules = [
            ViewBog::getType(),
            ViewPlain::getType(),
            ViewMountain::getType(),
            ViewWater::getType(),
        ];
    }

    public function setAttackRules()
    {
        $this->attackRules = [
            UnitTechnic::getType(),
        ];
    }

    public static function getType()
    {
        return 'airplane';
    }
}