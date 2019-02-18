<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class KernelTest extends TestCase
{
    public function testAssertTrue(): void
    {
        static::assertTrue(true);
    }
}

