<?php

namespace PoLaKoSz\Mafab;

use PoLaKoSz\Mafab\EndPoints\SearchEndpointInterface;

interface MafabInterface
{
    /**
     * Search for Movie(s).
     *
     * @return PoLaKoSz\Mafab\EndPoints\SearchEndpointInterface
     */
    public function search() : SearchEndpointInterface;
}
