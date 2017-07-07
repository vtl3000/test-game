<?php


namespace TestGame\unit;


use TestGame\view\ViewMountain;
use TestGame\view\ViewPlain;
use TestGame\view\ViewWater;

class UnitPeople extends AUnit
{
    public function setMoveRules()
    {
        $this->moveRules = [
            ViewPlain::getType(),
            ViewMountain::getType(),
            ViewWater::getType(),
        ];
    }

    public function setAttackRules()
    {
        $this->attackRules = [
            UnitTechnic::getType(),
            UnitPeople::getType(),
        ];
    }

    public static function getType()
    {
        return 'people';
    }
}