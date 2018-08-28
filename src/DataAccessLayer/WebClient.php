<?php

namespace PoLaKoSz\Mafab\DataAccessLayer;

class WebClient implements IWebClient
{
    private $headers;



    public function __construct() {
        $this->headers = array(
            'User-Agent:       https://github.com/PoLaKoSz/Mafab/',
            'Accept:           application/json',
            //'Accept-Language:  en,en-US;q=0.5',
            'X-Requested-With: XMLHttpRequest',
        );
    }



    /**
     * https://stackoverflow.com/a/2107792/7306734
     */
    public function getSourceCode(string $url) : string {
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => $this->headers
            ]
        ];
        
        $context = stream_context_create($opts);

        return file_get_contents( $url, false, $context );
    }
}