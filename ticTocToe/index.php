<?php

use app\board;
use app\game;
use app\player;
use app\move;
use util\backn;

include "autoload.php";

echo "\n+ =============================== + \n\n";
echo "Wellcome to sharif ticTocToe game\n";
echo "choose Your Opponent:\n";
echo "(1) Humen\n";
echo "(2) Computer\n";

$userInput = readline();

while (!($userInput == 1 || $userInput == 2)) {
    echo "\nInvalid choice! choose Your Opponent:";
    $userInput = readline();
    backn::BSN();
}

$opponet = ($userInput == 1) ? 'HUMAN' : 'COMPUTER';

$game = new game;

$board = new board;
$board->display();

$player1 = new player;
$player1->setPlayerMark('X');

$player2 = new player;
$player2->setPlayerMark('O');

do {
    $player1->askForInput($board, $game);
    if (!$game->getGO()) {

        if ($opponet == "HUMAN") {
            $player2->askForInput($board, $game);
        } else {
            echo "Player 2 is Thinking...";
            sleep(1);
            $player2->makeRandomMove($board, $game);
        }
    }
} while (!$game->getGO());


//declare win or tie
if ($game->getWinner() == 'X') {
    echo "Player 1 (X) won" . "\n\n";
} elseif ($game->getWinner() == 'O') {
    echo "Player 2 (O) won" . "\n\n";
} else {
    echo "The game is a tie" . "\n\n";
}
