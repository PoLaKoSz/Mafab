<?php

namespace PoLaKoSz\Mafab\Models;

class MafabMovie implements \JsonSerializable
{
    /**
     * There is no difference currently between a standalon movie
     * and a series
     */
    public const CAT = "movie";


    private $id;
    private $url;
    private $hungarianTitle;
    private $originalTitle;
    private $year;
    private $thumbnailImage;



    public function __construct( string $id, string $url, string $hungarianTitle, string $originalTitle, int $year, string $thumbnailImage) {
        $this->id = $id;
        $this->url = $url;
        $this->hungarianTitle = $hungarianTitle;
        $this->originalTitle = $originalTitle;
        $this->year = $year;
        $this->thumbnailImage = $thumbnailImage;
    }



    public function getID() : string {
        return $this->id;
    }

    public function getURL() : string {
        return $this->url;
    }

    public function getHungarianTitle() : string {
        return $this->hungarianTitle;
    }

    public function getOriginalTitle() : string {
        return $this->originalTitle;
    }

    /**
     * @return int -1 when no year found
     */
    public function getYear() : int {
        return $this->year;
    }

    /**
     * Check for a valid Year property
     */
    public function hasYear() : bool {
        return $this->getYear() != -1;
    }

    public function getThumbnailImage() : string {
        return $this->thumbnailImage;
    }


    public function jsonSerialize() {
        return [
            'id'              => $this->getID(),
            'url'             => $this->getURL(),
            'hungarian_title' => $this->getHungarianTitle(),
            'original_title'  => $this->getOriginalTitle(),
            'year'            => $this->getYear(),
            'thumbnail_image' => $this->getThumbnailImage(),
        ];
    }
}
