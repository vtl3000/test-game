<?php

namespace TestGame\unit;

use TestGame\player\IPlayer;
use TestGame\view\IView;

abstract class AUnit implements IUnit
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var IPlayer
     */
    protected $player;
    /**
     * @var string
     */
    protected $id;
    /**
     * @var array
     */
    protected $moveRules = [];
    /**
     * @var array
     */
    protected $attackRules = [];

    /**
     * UnitBase constructor.
     * @param string $name
     */
    function __construct($name = null)
    {
        $this->name = $name;
        $this->id = uniqid('unit_');
        $this->setMoveRules();
        $this->setAttackRules();
    }

    /**
     * @param IPlayer $player
     */
    public function setPlayer(IPlayer $player)
    {
        $this->player = $player;
    }

    /**
     * @return IPlayer
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param IView $view
     * @return bool
     */
    public function canMoveTo(IView $view)
    {
        return in_array($view->getType(), $this->moveRules);
    }

    /**
     * @param IUnit $unit
     * @return bool
     */
    public function canAttack(IUnit $unit)
    {
        return in_array($unit->getType(), $this->attackRules);
    }
}