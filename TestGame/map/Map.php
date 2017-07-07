<?php


namespace TestGame\map;


use TestGame\unit\IUnit;
use TestGame\view\IView;

class Map implements IMap
{
    /**
     * @var int
     */
    private $height;
    /**
     * @var int
     */
    private $width;
    private $views;
    private $defaultView;
    private $mapViews;
    private $mapUnits;

    /**
     * Map constructor.
     * @param $height
     * @param $width
     */
    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function addView(IView $class, $index, $default = false)
    {
        if ($default) {
            $this->defaultView = $class;
        }
        $this->views[] = [$class, $index, $default];
    }

    public function rand()
    {
        $all = $this->height * $this->width;
        foreach ($this->views as $view) {
            list($class, $index, $default) = $view;
            if ($default) {
                continue;
            }
            $repeat = round($all * $index);
            $this->randSetView($repeat, $class, $all);
        }
    }

    private function randSetView($repeat, IView $class, $try)
    {
        if (!$try) {
            throw new \Exception('Can\'t set view: ' . get_class($class));
        }
        if (!$repeat) {
            return;
        }
        $x = $this->randX();
        $y = $this->randY();
        if (!$isset = isset($this->mapViews[$x][$y])) {
            $this->mapViews[$x][$y] = $class;
        }
        $this->randSetView($isset ? $repeat : --$repeat, $class, --$try);
    }

    private function randSetUnit(IUnit $unit, $try)
    {
        if (!$try) {
            throw new \Exception('Can\'t set view: ' . get_class($unit));
        }
        $x = $this->randX();
        $y = $this->randY();
        if (isset($this->mapUnits[$x][$y]) || !$unit->canMoveTo($this->getView($x, $y))) {
            $this->randSetUnit($unit, --$try);
        } else {
            echo "$x $y " . $unit->getId() . PHP_EOL;
            $this->mapUnits[$x][$y] = $unit;
        }
    }

    private function randX()
    {
        return rand(0, $this->height - 1);
    }

    private function randY()
    {
        return rand(0, $this->width - 1);
    }

    public function addUnits(Array $units)
    {
        $try = $this->height * $this->width;
        foreach ($units as $unit) {
            $this->randSetUnit($unit, $try);
        }
    }

    public function getDefaultView()
    {
        return $this->defaultView;
    }

    /**
     * @param int $x
     * @param int $y
     * @return IView
     */
    public function getView($x, $y)
    {
        return isset($this->mapViews[$x][$y]) ? $this->mapViews[$x][$y] : $this->getDefaultView();
    }

    /**
     * @param int $x
     * @param int $y
     * @return IUnit|null
     */
    public function getUnit($x, $y)
    {
        return isset($this->mapUnits[$x][$y]) ? $this->mapUnits[$x][$y] : null;
    }


    public function moveUnit(IUnit $unit, $xFrom, $yFrom, $xTo, $yTo)
    {
        $this->dellUnit($xFrom, $yFrom);
        $this->mapUnits[$xTo][$yTo] = $unit;
    }

    /**
     * @param $x
     * @param $y
     */
    public function dellUnit($x, $y)
    {
        unset($this->mapUnits[$x][$y]);
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return mixed
     */
    public function getMapUnits()
    {
        return $this->mapUnits;
    }
}