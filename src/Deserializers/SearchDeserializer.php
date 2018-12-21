<?php

namespace PoLaKoSz\Mafab\Deserializers;

use PoLaKoSz\Mafab\Models\MafabMovie;
use PHPHtmlParser\Dom;

class SearchDeserializer
{
    private const BASEURL = 'https://mafab.hu';



    /**
     * Convert the raw HTML string into object(s)
     *
     * @return  Array   of MafabMovie
     */
    public static function convert(string $input) : array
    {
        $objects = json_decode($input);

        $response = array();

        foreach ($objects as &$object) {
            if ($object->cat != MafabMovie::CAT) {
                continue;
            }
            
            $id             = static::getID($object->id);
            $originalTitle  = static::getOriginalTitle($object->label);
            $year           = static::getYear($object->label);
            $thumnailImage  = static::getThumbnailImage($object->foto);

            array_push(
                $response,
                new MafabMovie($id, $object->id, $object->value, $originalTitle, $year, $thumnailImage)
            );
        }

        return $response;
    }

    private static function getID(string $mafabURL) : string
    {
        preg_match("/https:\/\/www.mafab.hu\/movies\/(.*).html/", $mafabURL, $match);

        return $match[1];
    }

    private static function getOriginalTitle(string $input) : string
    {
        return static::getFirstBracketsText($input, '/html/body/a/small');
    }

    private static function getYear(string $input) : int
    {
        try {
            return (int) static::getFirstBracketsText($input, '/html/body/a/small/small');
        } catch (\Exception $ex) {
            return -1;
        }
    }

    private static function getFirstBracketsText(string $input, string $xPath) : string
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($input);

        $domXPath = new \DOMXPath($dom);

        $node = $domXPath->query($xPath)->item(0);

        $nodeInnerText = utf8_decode($node->textContent);

        preg_match('/\((([^()]*|(?R))*)\)/', $nodeInnerText, $output);

        return $output[1];
    }

    private static function getThumbnailImage(string $input) : string
    {
        return static::BASEURL . $input;
    }
}
