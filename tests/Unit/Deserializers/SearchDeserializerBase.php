<?php

namespace PoLaKoSz\Mafab\Tests\Unit\Deserializers;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\Models\MafabMovie;

abstract class SearchDeserializerBase extends TestCase
{
    private static $results;
    private static $result;
    private static $model;



    protected function oneTimeSetup(string $json, MafabMovie $model)
    {
        $class = new SearchDeserializer();

        self::$results = $class->convert($json);
        self::$result  = self::$results[0];

        self::$model = $model;
    }



    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf(MafabMovie::class, self::$result);
    }

    public function testHasEnoughResults()
    {
        $this->assertEquals(1, count(self::$results));
    }

    public function testCanExtractMovieId()
    {
        $this->assertEquals(self::$model->getID(), self::$result->getID());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals(self::$model->getHungarianTitle(), self::$result->getHungarianTitle());
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertEquals(self::$model->getOriginalTitle(), self::$result->getOriginalTitle());
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals(self::$model->getURL(), self::$result->getURL());
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals(self::$model->getYear(), self::$result->getYear());
    }

    public function testMovieHasYear()
    {
        if (self::$result->getYear() == -1) {
            $this->assertEquals(false, self::$result->hasYear());
        } else {
            $this->assertEquals(true, self::$result->hasYear());
        }
    }

    public function testCanExtractMovieThumbnalImage()
    {
        $this->assertEquals(
            self::$model->getThumbnailImage(),
            self::$result->getThumbnailImage()
        );
    }
}
