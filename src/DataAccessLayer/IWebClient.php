<?php

namespace PoLaKoSz\Mafab\DataAccessLayer;

interface IWebClient
{
    public function getSourceCode(string $url) : string;
}