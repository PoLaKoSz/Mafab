<?php

namespace PoLaKoSz\Mafab\Endpoints;

interface SearchEndpointInterface
{
    /**
     * Search for Movie(s).
     *
     * @return Array of MafabMovie
     */
    public function quicklyFor(string $searchTerm) : array;
}
