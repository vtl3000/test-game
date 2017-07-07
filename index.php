<?php
spl_autoload_register(function ($class) {
    include str_replace('\\', '/', $class) . '.php';
});

$game = (new \TestGame\Builder())->small();

echo $game;

//$game = Game::findById($id);
//$game->moveUnit('player1', 'unitId', 0, 0, 0, 1);
//$game->attackUnit('player1', 'unitId', 0, 0, 0, 1);
