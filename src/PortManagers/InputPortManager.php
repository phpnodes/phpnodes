<?php

namespace Cove\PortManagers;

use Cove\Ports\InputPort;

class InputPortManager extends PortManager
{
    public function __construct(InputPort ...$ports)
    {
        $this->ports = $ports;
    }

    public function offsetGet($offset):InputPort
    {
        return $this->ports[$offset];
    }
}