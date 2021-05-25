<?php

declare(strict_types=1);

namespace TBoileau\Observer\Tests\Fixtures;

use TBoileau\Observer\EventInterface;

class FooEvent implements EventInterface
{
    private string $test;

    public function __construct(string $test)
    {
        $this->test = $test;
    }

    public static function getName(): string
    {
        return "foo";
    }

    public function getTest(): string
    {
        return $this->test;
    }

    public function setTest(string $test): void
    {
        $this->test = $test;
    }
}
