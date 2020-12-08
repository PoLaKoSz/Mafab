<?php

namespace PoLaKoSz\Mafab\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Mafab;

class MafabTest extends TestCase
{
    private static $mafab;

    public static function setUpBeforeClass(): void
    {
        static::$mafab = new Mafab();
    }

    public function testSearchReturnsSearchendpointinterface()
    {
        $this->assertInstanceOf("PoLaKoSz\Mafab\EndPoints\SearchEndpointInterface", static::$mafab->search());
    }
}
