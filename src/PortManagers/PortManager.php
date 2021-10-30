<?php

namespace Cove\PortManagers;

use ArrayAccess;
use ArrayIterator;
use Countable;
use Cove\PortManagers\Exceptions\PortManagerException;
use Cove\Ports\Port;

abstract class PortManager implements ArrayAccess, Countable
{
    protected array $ports;

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->ports);
    }

    public function offsetExists($offset):bool
    {
        return isset($this->ports[$offset]);
    }

    /**
     * @throws PortManagerException
     */
    public function offsetGet($offset):mixed
    {
        throw new PortManagerException();
    }

    /**
     * @throws PortManagerException
     */
    public function offsetSet($offset, $value):void
    {
        throw new PortManagerException();
    }

    /**
     * @throws PortManagerException
     */
    public function offsetUnset($offset):void
    {
        throw new PortManagerException();
    }

    public function count():int
    {
        return count($this->ports);
    }
}