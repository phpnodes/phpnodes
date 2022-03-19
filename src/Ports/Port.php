<?php

namespace Cove\Ports;

use Cove\Connectors\Connector;
use Cove\Nodes\Contracts\NodeContract;

abstract class Port
{
    protected ?Connector $connector;

    /**
     * IntegerInputPort constructor.
     */
    public function __construct(protected NodeContract $node)
    {
    }

    public function setConnector(Connector $connector):void
    {
        $this->connector = $connector;
    }

    public function removeConnector():void
    {
        $this->connector = null;
    }
}