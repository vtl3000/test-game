<?php


namespace TestGame\unit;


use TestGame\view\ViewBog;
use TestGame\view\ViewPlain;

class UnitTechnic extends AUnit
{
    public function setMoveRules()
    {
        $this->moveRules = [
            ViewBog::getType(),
            ViewPlain::getType(),
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
        return 'technic';
    }
}