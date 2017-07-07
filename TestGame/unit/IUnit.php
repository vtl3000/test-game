<?php
namespace TestGame\unit;

use TestGame\player\IPlayer;
use TestGame\view\IView;

interface IUnit {
    public function setPlayer(IPlayer $player);
    public function getPlayer();
    public function getId();
    public function canMoveTo(IView $view);
    public function canAttack(IUnit $unit);
    public function setMoveRules();
    public function setAttackRules();
    public static function getType();
}