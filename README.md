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

# Tests

## on Windows

Navigate to the root folder with the terminal and run

`.\\vendor\\bin\\phpunit --bootstrap .\\vendor\\autoload.php --testdox .\\tests`

or

`.\\vendor\\bin\\phpunit --bootstrap .\\vendor\\autoload.php .\\tests\\Deserializers\\SearchDeserializerTest`
