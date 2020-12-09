<?php

namespace PoLaKoSz\Mafab\EndPoints;

interface SearchEndpointInterface
{
    /**
     * Search for Movie(s).
     *
     * @return Array of MafabMovie
     */
    public function quicklyFor(string $searchTerm) : array;
}
