<?php


namespace TestGame\unit;


use TestGame\view\ViewPlain;

class UnitBase extends AUnit {

    public function setMoveRules()
    {
        $this->moveRules = [
//            ViewBog::getType(),
            ViewPlain::getType(),
//            ViewMountain::getType(),
//            ViewWater::getType(),
        ];
    }

    public function setAttackRules()
    {
        $this->attackRules = [
//            UnitBase::getType(),
//            UnitTechnic::getType(),
//            UnitPeople::getType(),
//            UnitAirplane::getType(),
        ];
    }

    public static function getType()
    {
        return 'base';
    }
}
