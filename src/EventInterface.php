<?php

declare(strict_types=1);

namespace TBoileau\Observer;

interface EventInterface
{
    public static function getName(): string;
}