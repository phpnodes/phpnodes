<?php

namespace Cove\Connectors;

use Cove\Ports\InputPort;
use Cove\Ports\OutputPort;

class Connector
{
    public readonly OutputPort $output;
    public readonly InputPort  $input;

    public function patch(OutputPort $output, InputPort $input)
    {
        $this->output = $output;
        $this->input  = $input;

        $input->setConnector($this);
    }
}