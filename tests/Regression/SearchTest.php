<?php

namespace PoLaKoSz\Mafab\Tests\Regression;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Models\MafabMovie;
use PoLaKoSz\Mafab\Search;

class SearchTest extends TestCase
{
    private static $results;



    public static function setUpBeforeClass()
    {
        $page          = new Search();
        self::$results = $page->search('Last Days in the Desert');
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf(MafabMovie::class, self::$results[0]);
    }

    public function testHasAtLeastOneResult()
    {
        $this->assertGreaterThanOrEqual(1, count(self::$results));
    }

    public function testCanExtractMovieId()
    {
        $this->assertNotEmpty(self::$results[0]->getID());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertNotEmpty(self::$results[0]->getHungarianTitle());
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertNotEmpty(self::$results[0]->getOriginalTitle());
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertNotEmpty(self::$results[0]->getURL());
    }

    public function testCanExtractMovieYear()
    {
        if (self::$results[0]->hasYear()) {
            $this->assertGreaterThan(1800, self::$results[0]->getYear());
        } else {
            $this->assertEquals(-1, self::$results[0]->getYear());
        }
    }

    public function testCanExtractMovieThumbnalImage()
    {
        $this->assertNotEmpty(self::$results[0]->getThumbnailImage());
    }
}
