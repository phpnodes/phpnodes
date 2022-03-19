<?php

use Cove\PortManagers\InputPortManager;
use Cove\Ports\IntegerInputPort;

it(
    'has input port',
    function () {
        $node             = anonymousNode();
        $port             = new IntegerInputPort($node);
        $inputPortManager = new InputPortManager(
            $port
        );

        expect($inputPortManager[0])->toBe($port);
        expect(count($inputPortManager))->toBe(1);
    }
);