<?php

declare(strict_types=1);

namespace TBoileau\Observer\Tests\Fixtures;

use TBoileau\Observer\EventInterface;
use TBoileau\Observer\EventListenerInterface;

class FooListener implements EventListenerInterface
{
    /**
     * @param ?FooEvent $event
     */
    public function listen(?EventInterface $event): void
    {
        $event->setTest("bar");
    }
}
