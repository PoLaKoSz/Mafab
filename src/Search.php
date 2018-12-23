<?php

namespace PoLaKoSz\Mafab;

use PoLaKoSz\Mafab\DataAccessLayer\WebClient;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\EndPoint;

class Search extends Endpoint
{
    public function __construct()
    {
        parent::__construct(new WebClient(), 'js/autocomplete.php?');
    }



    /**
     * Search for Movie(s)
     *
     * @return  Array   of MafabMovie
     */
    public function search(string $searchTerm) : array
    {
        $searchTerm = urlencode($searchTerm);

        $apiResults = parent::callAPI('term=' . $searchTerm);

        return SearchDeserializer::convert($apiResults);
    }
}
