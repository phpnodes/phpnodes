<?php

namespace Cove\Nodes;

use Cove\PortManagers\InputPortManager;
use Cove\PortManagers\OutputPortManager;
use JetBrains\PhpStorm\Pure;

abstract class Node
{
    public readonly InputPortManager $input;
    public readonly OutputPortManager $output;

    #[Pure] public function __construct()
    {
        $this->input = new InputPortManager();
        $this->output = new OutputPortManager();
    }
}