# Mafab.hu

[![Build Status](https://travis-ci.com/PoLaKoSz/Mafab.svg?branch=master)](https://travis-ci.com/PoLaKoSz/Mafab)

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

## Tests

- `$ composer run-all-tests`: runs both unit and regression tests
- `$ composer run-u-tests`: runs only the unit tests
- `$ composer run-r-tests`: runs only the regression tests (to detect HTML DOM changes in the endpoints - calls Mafab.hu and after try the response)
