# Mafab.hu

Mafab.hu is the hungarian IMDb according to [this article](http://www.vox.hu/newvox/?p=12222). This PHP library helps to search for movies on it.

## Install

Via Composer

`$ composer require polakosz/mafab`


## Usage

```` php
use PoLaKoSz\Mafab\Search;
...
$mafab = new Search();

$results = $mafab->search( 'Avatar' );

echo $results;
````
