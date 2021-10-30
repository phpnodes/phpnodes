<?php

namespace Cove\Nodes;

use Cove\Nodes\Contracts\NodeContract;
use Cove\PortManagers\InputPortManager;
use Cove\PortManagers\OutputPortManager;
use Cove\Ports\IntegerInputPort;
use Cove\Ports\IntegerOutputPort;
use JetBrains\PhpStorm\Pure;

class AndNode extends Node implements NodeContract
{
    public readonly InputPortManager $input;
    public readonly OutputPortManager $output;
    #[Pure] public function __construct()
    {
        $this->input = new InputPortManager(
            new IntegerInputPort($this),
            new IntegerInputPort($this),
        );
        $this->output = new OutputPortManager(
            new IntegerOutputPort($this)
        );
    }

    public function calculate():int
    {
        return $this->input[0]->value & $this->input[1]->value;
    }
}