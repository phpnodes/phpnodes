# Node based programming using php

I first though about using constructor and returning some kind of output object with the computed values. This could work, but would not be a good representation of the structure for nodes and connectors.
I had a better idea when I thought about having a connector object that patches output to input ports of the nodes.
So now we have 4 concepts that we can start to flesh out.

* Connector
* Input Port (typed)
* Output Port (typed)
* Node

To keep things simple i first want to make a couple of nodes to calculate binary logic. I chose these because the logic is simple which makes them easy to build and easy to test.
Let's start with making the test and then we can implement the code later.

tests/Unit/ConnectorTest.php
```php
<?php

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
```

tests/Unit/AndNodeTest.php
```php
<?php

it(
    'AndNode using 5 & 3 equals to 1',
    function () {
        $a = new IntegerValueNode(7);
        $b = new IntegerValueNode(3);
        $node = new AndNode();

        (new Connector)->patch(
            $a->output->port[0],
            $node->input->port[0]
        );

        (new Connector)->patch(
            $b->output->port[0],
            $node->input->port[1]
        );

        $result = $node->output->port[0]->getResult();
        expect($result)->toEqual(1);
        expect($result)->toEqual(5 & 3);
    }
);
```

Looking at the code we need some sort of port manager for the input and output of nodes. Let's write some tests for that too.

tests/Unit/InputPortManagerTest.php

```php
<?php

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
```

tests/Unit/OutputPortManagerTest.php

```php
<?php

it(
    'has input port',
    function () {
        $port = new IntegerOutputPort();
        $outputPortManager = new OutputPortManager(
            $port
        );

        expect($outputPortManager[0])->toBe($port);
        expect(count($outputPortManager))->toBe(1);
    }
);
```


By running the tests we fail big time.

```txt

   PASS  Tests\ExampleTest
  ✓ example

   FAIL  Tests\Unit\AndNodeTest
  ⨯ it AndNode using 5 & 3 equals to 1

   FAIL  Tests\Unit\ConnectorTest
  ⨯ it can connect to an input port

   FAIL  Tests\Unit\InputPortManagerTest
  ⨯ it has input port

   FAIL  Tests\Unit\OutputPortManagerTest
  ⨯ it has input port

  ---

  • Tests\Unit\AndNodeTest > it AndNode using 5 & 3 equals to 1
   Error

  Class "IntegerValueNode" not found

  at tests/Unit/AndNodeTest.php:7
      3▕
      4▕ it(
      5▕     'AndNode using 5 & 3 equals to 1',
      6▕     function () {
  ➜   7▕         $a = new IntegerValueNode(7);
      8▕         $b = new IntegerValueNode(3);
      9▕         $node = new AndNode();
     10▕
     11▕         (new Connector)->patch(


  • Tests\Unit\ConnectorTest > it can connect to an input port
   Error

  Class "IntegerInputPort" not found

  at tests/Unit/ConnectorTest.php:6
      2▕
      3▕ it(
      4▕     'can connect to an input port',
      5▕     function () {
  ➜   6▕         $input = new IntegerInputPort();
      7▕         $output = new IntegerOutputPort();
      8▕         $connector = new Connector();
      9▕         $connector->patch($output, $input);
     10▕


  • Tests\Unit\InputPortManagerTest > it has input port
   Error

  Class "IntegerInputPort" not found

  at tests/Unit/InputPortManagerTest.php:6
      2▕
      3▕ it(
      4▕     'has input port',
      5▕     function () {
  ➜   6▕         $port = new IntegerInputPort();
      7▕         $inputPortManager = new InputPortManager(
      8▕             $port
      9▕         );
     10▕


  • Tests\Unit\OutputPortManagerTest > it has input port
   Error

  Class "IntegerOutputPort" not found

  at tests/Unit/OutputPortManagerTest.php:6
      2▕
      3▕ it(
      4▕     'has input port',
      5▕     function () {
  ➜   6▕         $port = new IntegerOutputPort();
      7▕         $outputPortManager = new OutputPortManager(
      8▕             $port
      9▕         );
     10▕



  Tests:  4 failed, 1 passed
  Time:   0.02s
```

Let's start writing some actual classes.

src/Connectors/Connector.php

```php
<?php

namespace Cove\Connectors;

use Cove\Ports\InputPort;
use Cove\Ports\OutputPort;

class Connector
{
    public readonly OutputPort $output;
    public readonly InputPort  $input;

    public function patch(OutputPort $output, InputPort $input)
    {
        $this->output = $output;
        $this->input  = $input;
    }
}
```


