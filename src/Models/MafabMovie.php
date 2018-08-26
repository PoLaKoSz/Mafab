<?php

namespace PoLaKoSz\Mafab\Models;

class MafabMovie
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



    public function __construct($id, $url, $hungarianTitle, $originalTitle, $year, $thumbnailImage) {
        $this->id = $id;
        $this->url = $url;
        $this->hungarianTitle = $hungarianTitle;
        $this->originalTitle = $originalTitle;
        $this->year = $year;
        $this->thumbnailImage = $thumbnailImage;
    }



    public function getID() : int {
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

    public function getYear() : string {
        return $this->year;
    }

    public function getThumbnailImage() : string {
        return $this->thumbnailImage;
    }
}
