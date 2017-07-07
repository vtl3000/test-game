<?php


namespace TestGame;


use TestGame\map\IMap;
use TestGame\player\IPlayer;

class Game
{
    /**
     * @var IMap
     */
    private $map;
    /**
     * @var array
     */
    private $players = [];

    /**
     * @return IMap
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param IMap|Map $map
     */
    public function setMap($map)
    {
        $this->map = $map;
    }

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param mixed $players
     */
    public function setPlayers($players)
    {
        $this->players = $players;
    }

    /**
     * @param mixed $player
     */
    public function addPlayer(IPlayer $player)
    {
        $this->players[$player->getName()] = $player;
    }

    /**
     * @param string $playerName
     * @return IPlayer|null
     */
    public function getPlayer($playerName)
    {
        return array_key_exists($playerName, $this->players) ? $this->players[$playerName] : null;
    }

    public function moveUnit($playerName, $unitId, $xFrom, $yFrom, $xTo, $yTo)
    {
        $unit = $this->getPlayer($playerName)->getUnit($unitId);
        $unitOnMapFrom = $this->getMap()->getUnit($xFrom, $yFrom);
        $unitOnMapTo = $this->getMap()->getUnit($xTo, $yTo);
        $view = $this->getMap()->getView($xTo, $yTo);
        if (!$unitOnMapTo && $unit->getId() == $unitOnMapFrom->getId() && $unit->canMoveTo($view)) {
            $this->getMap()->moveUnit($unit, $xFrom, $yFrom, $xTo, $yTo);
        } else {
            throw new \Exception('Unit can\`t move to');
        }
    }

    public function attackUnit($playerName, $unitId, $xFrom, $yFrom, $xTo, $yTo)
    {
        $unit = $this->getPlayer($playerName)->getUnit($unitId);
        $unitAttack = $this->getMap()->getUnit($xFrom, $yFrom);
        $unitAttacked = $this->getMap()->getUnit($xTo, $yTo);
        if ($unitAttacked && $unit->getId() == $unitAttack->getId() && $unit->canAttack($unitAttacked)) {
            //todo: do something
        } else {
            throw new \Exception('Unit can\`t attack to');
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $h = $w = 0;
        $hMax = $this->getMap()->getHeight();
        $wMax = $this->getMap()->getWidth();
        $res = '';
        $res2 = '';
        while ($h < $hMax) {
            $res2 .= "|";
            $res .= "|";
            while ($w < $wMax) {
                $unit = $this->getMap()->getUnit($h, $w);
                $res .= substr($this->getMap()->getView($h, $w)->getType(), 0, 5) . "\t|";
                $res2 .= substr(($unit ? $unit::getType() : ''), 0, 5) . "\t|";
                ++$w;
            }
            $res .= "\n\n";
            $res2 .= "\n";
            ++$h;
            $w = 0;
        }
        return $res . $res2;
    }
}