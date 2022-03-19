<?php

namespace Cove\Connectors;

use Cove\Ports\InputPort;
use Cove\Ports\OutputPort;

class Connector
{
    public readonly OutputPort $output;
    public readonly InputPort  $input;

    public function __construct(OutputPort $output, InputPort $input)
    {
        $this->output = $output;
        $this->input  = $input;

        $this->input->setConnector($this);
        $this->output->setConnector($this);
    }

    public function __destruct()
    {
        $this->input->removeConnector();
        $this->output->removeConnector();
    }
}