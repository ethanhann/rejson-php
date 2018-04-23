# Redis-ML-PHP

Redis-ML-PHP is a PHP client library for the [Redis-ML](http://redisml.io) module which implements several machine learning models as Redis data types.

## Requirements

* Redis running with the [Redis-ML](https://github.com/RedisLabsModules/redis-ml#building-and-running).
* PHP >=7
* [PhpRedis](https://github.com/phpredis/phpredis), [Predis](https://github.com/nrk/predis), or [php-redis-client](https://github.com/cheprasov/php-redis-client).

## Install

```bash
composer install ethanhann/redis-ml
```

## Load

```php-inline
require_once 'vendor/autoload.php';
```

## Usage Overview

Create a [Model](model-factory.md) factory, then use the factory to create a model.
See the reference documentation for how to use each data type:

1. [Random Forest](random-forest.md)
1. [Linear Regression](linear-regression.md)
1. [Logistic Regression](logistic-regression.md)
1. [k-means](k-means.md)
1. [Matrix](matrix.md)
