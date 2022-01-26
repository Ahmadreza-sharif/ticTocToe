<?php

namespace app;

class player
{
    private $playerMark;

    public function setPlayerMark($var)
    {
        $this->playerMark = $var;
    }

    public function getPlayerMark()
    {
        return $this->playerMark;
    }

    public function MakeMove($game, $board, $move)
    {

        $mark = $this->getPlayerMark();
        $board->markCell($move, $this->getPlayerMark());
        $game->setMoveTillNow();
        $game->checkSituation($board);
        return $board->display();
    }

    public function askForInput($board, $game)
    {
        $player = ($this->playerMark == "X") ? "player X" : "player O";

        $rowInput = readline($player . " Enter Number for Row:");
        $columnInput = readline($player . " Enter Number for column:");

        $move = new move;
        $move->setColumn($columnInput);
        $move->setRow($rowInput);

        $move = $board->checkAvailable($move, $player);

        // var_dump($move->getValid());

        if ($move->getValid()) {
            return $this->MakeMove($game, $board, $move);
        } else {
            $this->askForInput($board, $game);
        }
    }

    public function makeRandomMove($board, $game)
    {
        $player = "computer";
        $row = rand(1, 3);
        $column = rand(1, 3);

        $move = new move;
        $move->setColumn($column);
        $move->setRow($row);

        $move = $board->checkAvailable($move, $player);

        if ($move->getValid()) {
            echo "Player 2 (O) has made a move at Row : " . $row . " , Column : " . $column . "\n\n";
            return $this->MakeMove($game, $board, $move);
        } else {
            return $this->makeRandomMove($board, $game);
        }
    }
}
