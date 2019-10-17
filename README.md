<p align="center"><img src="./resources/thunder-logo.svg"></p>

<p align="center">
<a href="https://packagist.org/packages/rxthunder/eventstore"><img src="https://poser.pugx.org/rxthunder/eventstore/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/rxthunder/eventstore"><img src="https://poser.pugx.org/rxthunder/eventstore/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rxthunder/eventstore"><img src="https://poser.pugx.org/rxthunder/eventstore/license.svg" alt="License"></a>
</p>
<p align="center">
<a href="https://travis-ci.org/RxThunder/EventStore"><img src="https://travis-ci.org/RxThunder/EventStore.svg?branch=master" alt="Build"></a>
<p align="center">


## Installation 

```
composer install rxthunder/eventstore
```

## Setup

First you must add new secrets in your .env files

```
# .env
EVENTSTORE_DSN_HTTP=
EVENTSTORE_DSN_TCP=
```

Then configure new parameters to be injected in the container

```php
# config/parameters.php

$container->setParameter('eventstore.http', getenv('EVENTSTORE_DSN_HTTP'));
$container->setParameter('eventstore.tcp', getenv('EVENTSTORE_DSN_TCP'));
```

Copy paste the configuration of the desired console

```php
# config/services.php

require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/services.php';

use RxThunder\EventStore\Console\EventStoreConsole;
use RxThunder\EventStore\Console\EventStoreSetupConsole;

$container->register(EventStoreConsole::class)
    ->setPublic(true)
    ->setAutowired(true)
    ->setAutoconfigured(true)
;

$container->register(EventStoreSetupConsole::class)
    ->setPublic(true)
    ->setAutowired(true)
    ->setAutoconfigured(true)
;
```

Or if you prefer you can include the all existing and futures consoles

```php
# config/services.php

require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/services.php';
require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/consoles.php';
```

### Tip

If you don't need to automatically setup your EventStore projections with the 
relative console, then don't register the `EventStoreSetupConsole`.

This avoids the need to configure the following chapter.

### [PHP-HTTP](http://docs.php-http.org/en/latest/index.html)
It remain a final step, only if you want to use the `EventStoreSetupConsole`.

If you haven't already added a HTTP client implementation
(PSR-18) into the DI. Find here a list of [existing implementation](https://packagist.org/providers/psr/http-client-implementation)

Similarly HTTP Requests must be built by your favorite factory, and you can found
some library ready to use on [packagist](https://packagist.org/providers/php-http/message-factory-implementation).

Afterward simply alias your favorite client and factory with the interfaces.

```php
$container->setAlias(\Psr\Http\Client\ClientInterface::class, ClientImplementation::class);
$container->setAlias(Http\Message\RequestFactory::class, FactoryImplementation::class);
```

## Profit

You got new consoles !

```
php vendor/bin/thunder
```



