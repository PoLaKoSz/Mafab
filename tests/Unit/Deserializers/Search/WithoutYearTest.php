<?php

namespace PoLaKoSz\Mafab\Tests\Unit\Deserializers\Search;

use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\Models\MafabMovie;
use PoLaKoSz\Mafab\Tests\Unit\Deserializers\SearchDeserializerBase;

class WithoutYearTest extends SearchDeserializerBase
{
    public function __construct()
    {
        $json = json_encode([
            0 => [
                "cat"  => "movie",
                "id"   => "https://www.mafab.hu/movies/the-penguins-of-madagascar-210820.html",
                "value"=> "The Penguins of Madagascar",
                // phpcs:disable
                "label"=> '<a style="display:block; min-height:50px;" style="color:#015F7F" href="https://www.mafab.hu/movies/the-penguins-of-madagascar-210820.html"><span class="mainlink"><b>The Penguins of Madagascar</b></span> <br /><small style="color:#000 !important;">(The Penguins of Madagascar)<br /><small><span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">animáció</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">vígjáték</span></small></a>',
                "foto" => "/img/icon_kino_default.jpg"
            ]
        ]);

        $id             = 'the-penguins-of-madagascar-210820';
        $url            = 'https://www.mafab.hu/movies/the-penguins-of-madagascar-210820.html';
        $hungarianTitle = 'The Penguins of Madagascar';
        $originalTitle  = 'The Penguins of Madagascar';
        $year           =  -1;
        $thumbnailImage = 'https://mafab.hu/img/icon_kino_default.jpg';

        $model = new MafabMovie($id, $url, $hungarianTitle, $originalTitle, $year, $thumbnailImage);
        parent::__construct($json, $model);
    }
}
