<?php

namespace Cove\Nodes;

use Cove\PortManagers\InputPortManager;
use Cove\PortManagers\OutputPortManager;

abstract class Node
{
    public readonly InputPortManager $input;
    public readonly OutputPortManager $output;
}