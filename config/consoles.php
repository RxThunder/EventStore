<?php

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
