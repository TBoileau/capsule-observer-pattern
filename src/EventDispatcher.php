<?php

declare(strict_types=1);

namespace TBoileau\Observer;

class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var array<string, array<array-key, EventListenerInterface>>
     */
    private array $listeners = [];

    public function dispatch(string $eventName, ?EventInterface $event = null): void
    {
        foreach ($this->listeners[$eventName] as $listener) {
            $listener->listen($event);
        }
    }

    public function attach(string $eventName, EventListenerInterface $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }
}
