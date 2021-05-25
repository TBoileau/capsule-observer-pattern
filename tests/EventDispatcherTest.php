<?php

declare(strict_types=1);

namespace TBoileau\Observer\Tests;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use TBoileau\Observer\EventDispatcher;
use PHPUnit\Framework\TestCase;
use TBoileau\Observer\Tests\Fixtures\BarEvent;
use TBoileau\Observer\Tests\Fixtures\FooEvent;

class EventDispatcherTest extends TestCase
{
    private EventDispatcherInterface $eventDispatcher;

    protected function setUp(): void
    {
        $this->eventDispatcher = new EventDispatcher(new class() implements ListenerProviderInterface {
            public function getListenersForEvent(object $event): iterable
            {
                $listeners = [
                    FooEvent::class => [
                        function (FooEvent $event) {
                            $event->setTest("bar");
                        },
                        function (FooEvent $event) {
                            $event->setTest("qux");
                        }
                    ],
                    BarEvent::class => [
                        function (BarEvent $event) {
                            $event->setTest("foo");
                        },
                        function (BarEvent $event) {
                            $event->setTest("qux");
                        }
                    ]
                ];

                return $listeners[$event::class];
            }
        });
    }

    public function testIfDispatchIsSuccessful(): void
    {
        $event = new FooEvent("foo");

        $this->assertEquals("foo", $event->getTest());

        $this->eventDispatcher->dispatch($event);

        $this->assertEquals("qux", $event->getTest());
    }

    public function testIfStoppableEventIsWorking(): void
    {
        $event = new BarEvent("bar");

        $this->assertEquals("bar", $event->getTest());

        $this->eventDispatcher->dispatch($event);

        $this->assertEquals("foo", $event->getTest());
    }
}
