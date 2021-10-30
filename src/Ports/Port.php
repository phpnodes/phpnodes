<?php

namespace Cove\Ports;

use Cove\Nodes\Contracts\NodeContract;

abstract class Port
{
    /**
     * IntegerInputPort constructor.
     */
    public function __construct(protected NodeContract $node)
    {
    }
}