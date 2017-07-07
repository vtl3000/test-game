<?php

namespace TestGame;

use TestGame\map\Map;
use TestGame\player\Player;
use TestGame\unit\UnitAirplane;
use TestGame\unit\UnitBase;
use TestGame\unit\UnitPeople;
use TestGame\unit\UnitTechnic;
use TestGame\view\ViewBog;
use TestGame\view\ViewMountain;
use TestGame\view\ViewPlain;
use TestGame\view\ViewWater;

class Builder
{
    /**
     * @return Game
     */
    public function small()
    {
        $player1 = new Player('player1');
        $player1->addUnit(new UnitBase('player1Base'));
        $player1->addUnit(new UnitTechnic());
        $player1->addUnit(new UnitPeople());
        $player1->addUnit(new UnitAirplane());

        $player2 = new Player('player2');
        $player2->addUnit(new UnitBase('player2Base'));
        $player2->addUnit(new UnitTechnic());
        $player2->addUnit(new UnitPeople());
        $player2->addUnit(new UnitAirplane());

        $map = new Map(5, 5);
        $map->addView(new ViewPlain(), $index = 0.5, $default = true);
        $map->addView(new ViewWater(), 0.2);
        $map->addView(new ViewMountain(), 0.1);
        $map->addView(new ViewBog(), 0.2);
        $map->rand();
        $map->addUnits($player1->getUnits());
        $map->addUnits($player2->getUnits());

        $game = new Game();
        $game->setMap($map);
        $game->addPlayer($player1);
        $game->addPlayer($player2);

        return $game;
    }
}