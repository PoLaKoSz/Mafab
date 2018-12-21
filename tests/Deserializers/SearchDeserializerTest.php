<?php

namespace PoLaKoSz\Mafab\Tests\Deserializers;

use PHPUnit\Framework\TestCase;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\Models\MafabMovie;

class SearchDeserializerTest extends TestCase
{
    private $class;
    private $rampageMovie;
    private $madagascarMovie;



    public function __construct()
    {
        $this->class = new SearchDeserializer();

        $this->rampageMovie = [
            "cat"  => "movie",
            "id"   => "https://www.mafab.hu/movies/rampage-291177.html",
            "value"=> "Rampage: Tombolás",
            // phpcs:disable
            "label"=> '<a style="display:block; min-height:50px;" style="color:#015F7F" href="https://www.mafab.hu/movies/rampage-291177.html"><span class="mainlink"><b>Rampage: Tombolás</b></span> <br /><small style="color:#000 !important;">(Rampage)<br /> <small style="font-weight:normal; color:#000;">(2018)</small> <small><span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">akció</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">kaland</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">sci-fi</span></small></a>',
            "foto" => "/static/thumb/w60/2018/92/02/291177_1522714089.6506.jpg"
        ];
        
        $this->madagascarMovie = [
            "cat"  => "movie",
            "id"   => "https://www.mafab.hu/movies/the-penguins-of-madagascar-210820.html",
            "value"=> "The Penguins of Madagascar",
            // phpcs:disable
            "label"=> '<a style="display:block; min-height:50px;" style="color:#015F7F" href="https://www.mafab.hu/movies/the-penguins-of-madagascar-210820.html"><span class="mainlink"><b>The Penguins of Madagascar</b></span> <br /><small style="color:#000 !important;">(The Penguins of Madagascar)<br /><small><span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">animáció</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">vígjáték</span></small></a>',
            "foto" => "/img/icon_kino_default.jpg"
        ];
    }



    public function testReturnValidObjectType()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertInstanceOf(MafabMovie::class, $result);
    }

    public function testCanExtractMultipleResults()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie,
            1 => $this->madagascarMovie
        ]);

        $results = $this->class->convert($apiResponse);

        $this->assertEquals(2, count($results));
    }

    public function testCanExtractMovieId()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals('rampage-291177', $result->getID());
    }

    public function testCanExtractMovieHungarianTitle()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals('Rampage: Tombolás', $result->getHungarianTitle());
    }

    public function testCanExtractMovieOriginalTitle()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals('Rampage', $result->getOriginalTitle());
    }

    public function testCanExtractMovieUrl()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals('https://www.mafab.hu/movies/rampage-291177.html', $result->getURL());
    }

    public function testCanExtractMovieYear()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals(2018, $result->getYear());
    }

    public function testMovieWithoutYear()
    {
        $apiResponse = json_encode([
            0 => $this->madagascarMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];

        $this->assertEquals(-1, $result->getYear());
        $this->assertEquals(false, $result->hasYear());
    }

    public function testCanExtractMovieThumbnalImage()
    {
        $apiResponse = json_encode([
            0 => $this->rampageMovie
        ]);

        $results = $this->class->convert($apiResponse);
        $result = $results[0];
        
        $this->assertEquals(
            'https://mafab.hu/static/thumb/w60/2018/92/02/291177_1522714089.6506.jpg',
            $result->getThumbnailImage()
        );
    }
}
