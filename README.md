# Mafab.hu

[![Build Status](https://travis-ci.com/PoLaKoSz/Mafab.svg?branch=master)](https://travis-ci.com/PoLaKoSz/Mafab)
[![Latest Stable Version](https://poser.pugx.org/polakosz/Mafab/v/stable)](https://packagist.org/packages/polakosz/Mafab)
[![Total Downloads](https://poser.pugx.org/polakosz/Mafab/downloads)](https://packagist.org/packages/polakosz/Mafab)
[![License](https://poser.pugx.org/polakosz/Mafab/license)](https://packagist.org/packages/polakosz/Mafab)

Mafab.hu is the hungarian IMDb according to [this article](http://www.vox.hu/newvox/?p=12222). This PHP library helps to search for movies on it.

## Install

Via Composer

`$ composer require polakosz/mafab`

## Usage

``` php
use PoLaKoSz\Mafab\Mafab;
...
$mafab = new Mafab();
$search = $mafab->search(); // @return PoLaKoSz\Mafab\EndPoint\SearchEndpointInterface

$results = $search->quicklyFor('Avatar');

print_r($results);
```

## Tests

- `$ composer run-all-tests`: runs both unit and regression tests
- `$ composer run-u-tests`: runs only the unit tests
- `$ composer run-r-tests`: runs only the regression tests (to detect HTML DOM changes in the endpoints - calls Mafab.hu and after try the response)
