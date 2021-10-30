<?php

use Cove\PortManagers\InputPortManager;
use Cove\Ports\IntegerInputPort;

it(
    'has input port',
    function () {
        $port = new IntegerInputPort();
        $inputPortManager = new InputPortManager(
            $port
        );

        expect($inputPortManager[0])->toBe($port);
        expect(count($inputPortManager))->toBe(1);
    }
);