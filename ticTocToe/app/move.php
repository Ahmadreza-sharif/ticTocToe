<?php

namespace app;

class move
{
    private $row;
    private $column;
    private $isValid;


    public function getRow()
    {
        return $this->row;
    }

    public function getValid()
    {
        return $this->isValid;
    }

    public function getColumn()
    {
        return $this->column;
    }


    public function setValid($var)
    {
        $this->isValid = $var;
    }

    public function setRow($var)
    {
        $this->row = $var;
    }

    public function setColumn($var)
    {
        $this->column = $var;
    }
}
