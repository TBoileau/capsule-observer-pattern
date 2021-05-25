<?php

declare(strict_types=1);

namespace TBoileau\Observer;

interface EventListenerInterface
{
    public function listen(?EventInterface $event): void;
}
