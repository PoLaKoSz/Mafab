<?php

namespace PoLaKoSz\Mafab\Tests\Unit\Deserializers\Search;

use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\Models\MafabMovie;
use PoLaKoSz\Mafab\Tests\Unit\Deserializers\SearchDeserializerBase;

class FullDetailsTest extends SearchDeserializerBase
{
    public function __construct()
    {
        $json = json_encode([
            0 => [
                "cat"  => 'movie',
                "id"   => 'https://www.mafab.hu/movies/rampage-291177.html',
                "value"=> 'Rampage: Tombolás',
                // phpcs:disable
                "label"=> '<a style="display:block; min-height:50px;" style="color:#015F7F" href="https://www.mafab.hu/movies/rampage-291177.html"><span class="mainlink"><b>Rampage: Tombolás</b></span> <br /><small style="color:#000 !important;">(Rampage)<br /> <small style="font-weight:normal; color:#000;">(2018)</small> <small><span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">akció</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">kaland</span> | <span style="text-transform: capitalize; font-size:9px" class="txt-mafab-blue">sci-fi</span></small></a>',
                "foto" => "/static/thumb/w60/2018/92/02/291177_1522714089.6506.jpg"
            ]
        ]);

        $id             = 'rampage-291177';
        $url            = 'https://www.mafab.hu/movies/rampage-291177.html';
        $hungarianTitle = 'Rampage: Tombolás';
        $originalTitle  = 'Rampage';
        $year           =  2018;
        $thumbnailImage = 'https://mafab.hu/static/thumb/w60/2018/92/02/291177_1522714089.6506.jpg';

        $model = new MafabMovie($id, $url, $hungarianTitle, $originalTitle, $year, $thumbnailImage);
        parent::__construct($json, $model);
    }
}
