<?php

declare(strict_types=1);

namespace TBoileau\Observer;

interface EventDispatcherInterface
{
    public function dispatch(string $eventName, ?EventInterface $event = null): void;

    public function attach(string $eventName, EventListenerInterface $listener): void;
}
