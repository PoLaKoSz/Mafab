<?php

namespace PoLaKoSz\Mafab;

interface SearchEndpointInterface
{
    /**
     * Search for Movie(s).
     *
     * @return Array of MafabMovie
     */
    public function search(string $searchTerm) : array;
}
