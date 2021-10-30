<?php

namespace Cove\Ports;

use Cove\Connectors\Connector;
use Cove\Ports\Exceptions\PortException;
use Cove\Ports\Exceptions\PortNotConnectedException;

/**
 * @property mixed $value
 */
abstract class InputPort extends Port
{
    protected Connector $connector;

    /**
     * @throws PortException
     * @throws PortNotConnectedException
     */
    public function __get(string $name):mixed
    {
        if ($name !== 'value') {
            throw new PortException();
        }

        if (empty($this->connector)) {
            throw new PortNotConnectedException();
        }

        return $this->getValue();
    }

    protected function getValue():mixed
    {
        return $this->connector->output->getResult();
    }

    public function setConnector(Connector $connector):void
    {
        $this->connector = $connector;
    }
}