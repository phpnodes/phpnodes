<?php

namespace Cove\Nodes;

use Cove\Nodes\Contracts\NodeContract;
use Cove\PortManagers\InputPortManager;
use Cove\PortManagers\OutputPortManager;
use Cove\Ports\IntegerOutputPort;
use JetBrains\PhpStorm\Pure;

class IntegerValueNode extends ValueNode implements NodeContract
{
    public readonly InputPortManager $input;
    public readonly OutputPortManager $output;
    #[Pure] public function __construct(int $value)
    {
        $this->value = $value;

        $this->input = new InputPortManager();
        $this->output = new OutputPortManager(
            new IntegerOutputPort($this)
        );
    }

    public function calculate():int
    {
        return $this->value;
    }
}