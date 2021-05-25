<?php

declare(strict_types=1);

namespace TBoileau\Observer\Tests;

use TBoileau\Observer\EventDispatcher;
use PHPUnit\Framework\TestCase;
use TBoileau\Observer\Tests\Fixtures\FooEvent;
use TBoileau\Observer\Tests\Fixtures\FooListener;

class EventDispatcherTest extends TestCase
{
    public function testIfDispatchIsSuccessful(): void
    {
        $eventDispatcher = new EventDispatcher();

        $event = new FooEvent("qux");

        $eventListener = new FooListener();

        $eventDispatcher->attach(FooEvent::getName(), $eventListener);

        $this->assertEquals("qux", $event->getTest());

        $eventDispatcher->dispatch(FooEvent::getName(), $event);

        $this->assertEquals("bar", $event->getTest());

    }
}
