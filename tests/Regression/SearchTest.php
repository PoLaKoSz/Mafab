<?php

namespace PoLaKoSz\Mafab\Tests\Regression;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Models\MafabMovie;
use PoLaKoSz\Mafab\Search;

class SearchTest extends TestCase
{
    private $results;



    public function __construct()
    {
        $page          = new Search();
        $this->results = $page->search('Last Days in the Desert');
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf(MafabMovie::class, $this->results[0]);
    }

    public function testHasAtLeastOneResult()
    {
        $this->assertGreaterThanOrEqual(1, count($this->results));
    }

    public function testCanExtractMovieId()
    {
        $this->assertNotEmpty($this->results[0]->getID());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertNotEmpty($this->results[0]->getHungarianTitle());
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertNotEmpty($this->results[0]->getOriginalTitle());
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertNotEmpty($this->results[0]->getURL());
    }

    public function testCanExtractMovieYear()
    {
        if ($this->results[0]->hasYear()) {
            $this->assertGreaterThan(1800, $this->results[0]->getYear());
        } else {
            $this->assertEquals(-1, $this->results[0]->getYear());
        }
    }

    public function testCanExtractMovieThumbnalImage()
    {
        $this->assertNotEmpty($this->results[0]->getThumbnailImage());
    }
}
