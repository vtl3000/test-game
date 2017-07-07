<?php


namespace TestGame\view;


class ViewPlain implements IView
{
    public static function getType()
    {
        return 'plain';
    }
}