<?php

use Cove\Connectors\Connector;
use Cove\Ports\IntegerInputPort;
use Cove\Ports\IntegerOutputPort;

it(
    'can connect to an input port',
    function () {
        $input = new IntegerInputPort();
        $output = new IntegerOutputPort();
        $connector = new Connector();
        $connector->patch($output, $input);

        expect($connector->input)->toBe($input);
        expect($connector->output)->toBe($output);
    }
);