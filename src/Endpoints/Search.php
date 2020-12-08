<?php

namespace PoLaKoSz\Mafab\Endpoints;

use PoLaKoSz\Mafab\DataAccessLayer\IWebClient;
use PoLaKoSz\Mafab\Deserializers\SearchDeserializer;
use PoLaKoSz\Mafab\EndPoint;

class Search extends Endpoint implements SearchEndpointInterface
{
    public function __construct(IWebClient $webclient)
    {
        parent::__construct($webclient, 'js/autocomplete.php?');
    }

    /**
     * Search for Movie(s).
     *
     * @return Array of MafabMovie
     */
    public function quicklyFor(string $searchTerm) : array
    {
        $searchTerm = urlencode($searchTerm);

        $apiResults = parent::callAPI('term=' . $searchTerm);

        return SearchDeserializer::convert($apiResults);
    }
}
