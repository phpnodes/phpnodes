<?php

namespace Cove\Ports;

abstract class OutputPort extends Port
{

    public function getResult():mixed
    {
        return $this->node->calculate();
    }
}