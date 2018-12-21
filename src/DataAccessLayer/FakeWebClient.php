<?php

namespace PoLaKoSz\Mafab\DataAccessLayer;

class FakeWebClient implements IWebClient
{
    private $jSon;



    public function __construct(string $jSon)
    {
        $this->jSon = $jSon;
    }



    public function getSourceCode(string $url) : string
    {
        return $this->jSon;
    }
}
