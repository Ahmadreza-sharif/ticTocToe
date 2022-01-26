<?php

namespace app;

class game
{
    private static $moveTillNow;
    private $gameOver;
    private $winner = null;

    public function setGO($var)
    {
        $this->gameOver = $var;
    }

    public function getGO()
    {
        return $this->gameOver;
    }

    public function setWinner($var)
    {
        $this->winner = $var;
    }

    public function getWinner()
    {
        return $this->winner;
    }

    public function setMoveTillNow()
    {
        self::$moveTillNow++;
    }

    public function getMoveTillNow()
    {
        return self::$moveTillNow;
    }

    public function checkSituation($board)
    {
        $moveTillNow = $this->getMoveTillNow();

        $cell = $board->getCell();

        if ($moveTillNow <= 9) {

            for ($i = 0; $i < 3; $i++) {

                if (($cell[$i][0] != "_") && ($cell[$i][0] == $cell[$i][1]) && ($cell[$i][1] == $cell[$i][2])) {
                    ($cell[$i][0] == "X") ? $this->setWinner("X") : $this->setWinner("O");
                    $this->setGO(true);
                }

                if (($cell[0][$i] != "_") && ($cell[0][$i] == $cell[1][$i]) && ($cell[1][$i] == $cell[2][$i])) {

                    ($cell[0][$i] == "X") ? $this->setWinner("X") : $this->setWinner("O");
                    $this->setGO(true);
                }
            }

            if (($cell[0][0] != "_") && ($cell[0][0] == $cell[1][1]) &&  ($cell[1][1] == $cell[2][2])) {

                ($cell[0][0] == "X") ? $this->setWinner("X") : $this->setWinner("O");
                $this->setGO(true);
            }
            if (($cell[0][2] != "_") && ($cell[1][1] == $cell[0][2]) && ($cell[1][1] == $cell[2][0])) {

                ($cell[0][2] == "X") ? $this->setWinner("X") : $this->setWinner("O");
                $this->setGO(true);
            }
        } else {
            $this->setGO(true);
        }
        if (($this->getMoveTillNow() == 9) && ($this->getWinner() == null)) {
            $this->setGO(true);
        }
    }
}
