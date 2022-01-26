<?php

namespace app;

use util\backn;

class board
{
    private $cell = [];

    public function __construct()
    {
        $row1 = ["_", "_", "_"];
        $row2 = ["_", "_", "_"];
        $row3 = ["_", "_", "_"];

        $this->cell[0] = $row1;
        $this->cell[1] = $row2;
        $this->cell[2] = $row3;
    }

    public function getCell()
    {
        return $this->cell;
    }

    public function display()
    {
        for ($i = 0; $i < 3; $i++) {
            backn::BSN();
            for ($a = 0; $a < 3; $a++) {

                echo $this->cell[$i][$a];
                echo "\t";
            }
            backn::BSN();
        }
        backn::BSN();
    }

    public function checkAvailable($move, $player)
    {
        $column = $move->getColumn();
        $row = $move->getRow();


        $validRowAndColumn = (($row >= 1 && $row <= 3) && (($column <= 3 && $column >= 1)));
        if ($validRowAndColumn) {
            $validCell = ($this->cell[$row - 1][$column - 1] == "_");
        } else {
            $validCell = false;
            echo "try Again.\n";
        }
        $validMove = ($validCell && $validRowAndColumn);
        $move->setValid($validMove);
        if ($validMove) {
            echo "\n$player mark column $column row $row\n";
        }
        return $move;
    }

    public function markCell($move, $mark)
    {
        if ($move->getValid()) {
            $column = $move->getColumn();
            $row = $move->getRow();
            $this->cell[$row - 1][$column - 1] = $mark;
        }
    }
}
