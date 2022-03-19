<?php

use Cove\Connectors\Connector;
use Cove\Ports\IntegerInputPort;
use Cove\Ports\IntegerOutputPort;

it(
    'can connect to an input port',
    function () {
        $node      = anonymousNode();
        $input     = new IntegerInputPort($node);
        $output    = new IntegerOutputPort($node);
        $connector = new Connector($output, $input);

        expect($connector->input)->toBe($input);
        expect($connector->output)->toBe($output);
    }
);