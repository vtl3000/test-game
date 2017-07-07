<?php


namespace TestGame\map;


use TestGame\unit\IUnit;
use TestGame\view\IView;

interface IMap
{
    public function rand();
    public function addView(IView $class, $index, $default = false);
    public function moveUnit(IUnit $unit, $xFrom, $yFrom, $xTo, $yTo);
    public function getWidth();
    public function getHeight();
    /**
     * @return IView
     */
    public function getDefaultView();

    /**
     * @param $x
     * @param $y
     * @return IView
     */
    public function getView($x, $y);
    /**
     * @param $x
     * @param $y
     */
    public function dellUnit($x, $y);

    /**
     * @param int $x
     * @param int $y
     * @return IUnit
     */
    public function getUnit($x, $y);
}