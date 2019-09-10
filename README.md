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
composer require rxthunder/eventstore
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

Register consoles

```php
# config/services.php

require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/services.php';

// Register eventstore consoles
$consoleDefinition = new Definition();
$consoleDefinition->setPublic(true);
$consoleDefinition->setAutowired(true);
$consoleDefinition->setAutoconfigured(true);

$this->registerClasses($consoleDefinition, 'RxThunder\\eventstore\\Console\\', '../vendor/rxthunder/eventstore/src/Console/*');
```

Or if you prefer you can include

```php
# config/services.php

require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/services.php';
require_once __DIR__ . '/../vendor/rxthunder/eventstore/config/consoles.php';
```

## Profit

You got new consoles !

```
php vendor/bin/thunder
```



