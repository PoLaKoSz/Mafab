<?php

namespace PoLaKoSz\Mafab\Tests\Unit\Deserializers;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\Models\MafabMovie;

abstract class SearchDeserializerBase extends TestCase
{
    private $results;
    private $result;
    private $model;



    public function __construct(string $json, MafabMovie $model)
    {
        $class = new SearchDeserializer();

        $this->results = $class->convert($json);
        $this->result = $this->results[0];

        $this->model = $model;
    }


    public function testReturnValidObjectType()
    {
        $this->assertInstanceOf(MafabMovie::class, $this->result);
    }

    public function testHasEnoughResults()
    {
        $this->assertEquals(1, count($this->results));
    }

    public function testCanExtractMovieId()
    {
        $this->assertEquals($this->model->getID(), $this->result->getID());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $this->assertEquals($this->model->getHungarianTitle(), $this->result->getHungarianTitle());
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $this->assertEquals($this->model->getOriginalTitle(), $this->result->getOriginalTitle());
    }

    public function testCanExtractMovieUrl()
    {
        $this->assertEquals($this->model->getURL(), $this->result->getURL());
    }

    public function testCanExtractMovieYear()
    {
        $this->assertEquals($this->model->getYear(), $this->result->getYear());
    }

    public function testMovieHasYear()
    {
        if ($this->result->getYear() == -1) {
            $this->assertEquals(false, $this->result->hasYear());
        } else {
            $this->assertEquals(true, $this->result->hasYear());
        }
    }

    public function testCanExtractMovieThumbnalImage()
    {
        $this->assertEquals(
            $this->model->getThumbnailImage(),
            $this->result->getThumbnailImage()
        );
    }
}
