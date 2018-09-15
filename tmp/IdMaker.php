<?php

class IdMaker
{
    private $_start = 0;
    private $_now = 0;
    private $_length = 100;

    public function getNextId()
    {
        if ($this->_now == 0 || $this->_now - $this->_start == $this->_length - 1) {
            $this->_start = $this->getNextIdFromDB();
            $this->_now = $this->_start;
        } else if ($this->_now - $this->_start < $this->_length - 1)
            $this->_now = $this->_now + 1;
        else
            assert(false);

        return $this->_now;
    }
}