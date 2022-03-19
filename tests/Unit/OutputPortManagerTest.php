<?php

use Cove\PortManagers\OutputPortManager;
use Cove\Ports\IntegerOutputPort;

it(
    'has output port',
    function () {
        $node              = anonymousNode();
        $port              = new IntegerOutputPort($node);
        $outputPortManager = new OutputPortManager(
            $port
        );

        expect($outputPortManager[0])->toBe($port);
        expect(count($outputPortManager))->toBe(1);
    }
);