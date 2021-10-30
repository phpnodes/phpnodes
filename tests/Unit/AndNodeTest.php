<?php


use Cove\Connectors\Connector;
use Cove\Nodes\AndNode;
use Cove\Nodes\IntegerValueNode;

it(
    'AndNode using 5 & 3 equals to 1',
    function () {
        $a = new IntegerValueNode(5);
        $b = new IntegerValueNode(3);
        $node = new AndNode();

        (new Connector)->patch(
            $a->output[0],
            $node->input[0]
        );

        (new Connector)->patch(
            $b->output[0],
            $node->input[1]
        );

        $result = $node->output[0]->getResult();
        expect($result)->toEqual(1);
        expect($result)->toEqual(5 & 3);
    }
);