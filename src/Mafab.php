<?php

namespace PoLaKoSz\Mafab;

use PoLaKoSz\Mafab\DataAccessLayer\WebClient;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\EndPoints\Search;
use PoLaKoSz\Mafab\EndPoints\SearchEndpointInterface;

class Mafab implements MafabInterface
{
    private $search;

    public function __construct()
    {
        $webClient = new WebClient();
        $this->search = new Search($webClient);
    }

    /**
     * Search for Movie(s).
     *
     * @return PoLaKoSz\Mafab\EndPoint\SearchEndpointInterface
     */
    public function search() : SearchEndpointInterface
    {
        return $this->search;
    }
}
