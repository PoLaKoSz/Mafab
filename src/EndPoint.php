<?php

namespace PoLaKoSz\Mafab;

use PoLaKoSz\Mafab\DataAccessLayer\IWebClient;

abstract class Endpoint
{
    private $webClient;
    private $url;
    private $headers;



    public function __construct(IWebClient $webClient, string $endpointAddress) {
        $this->webClient = $webClient;

        $this->url = 'https://www.mafab.hu/' . $endpointAddress;
    }



    /**
     * Change the endpoint WebClient
     */
    public function setWebClient(IWebClient $webClient) : void {
        $this->webClient = $webClient;
    }
    
    protected function callAPI(string $query) : string {
        return $this->webClient->getSourceCode( $this->url . $query );
    }
}