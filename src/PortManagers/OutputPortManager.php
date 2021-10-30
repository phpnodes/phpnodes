<?php

namespace Cove\PortManagers;

use Cove\Ports\OutputPort;

class OutputPortManager extends PortManager
{
    public function __construct(OutputPort ...$ports)
    {
        $this->ports = $ports;
    }

    public function offsetGet($offset):OutputPort
    {
        return $this->ports[$offset];
    }
}