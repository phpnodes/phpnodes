<?php

use Cove\PortManagers\OutputPortManager;
use Cove\Ports\IntegerOutputPort;

it(
    'has output port',
    function () {
        $port = new IntegerOutputPort();
        $outputPortManager = new OutputPortManager(
            $port
        );

        expect($outputPortManager[0])->toBe($port);
        expect(count($outputPortManager))->toBe(1);
    }
);