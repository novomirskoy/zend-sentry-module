<?php

return [
    'factories' => [
        'Novomirskoy\SentryModule\ModuleOptions' => 'Novomirskoy\SentryModule\Container\ModuleOptionsFactory',
        'RavenClient' => 'Novomirskoy\SentryModule\Container\RavenClientFactory',
        'Novomirskoy\SentryModule\Sentry' => 'Novomirskoy\SentryModule\Container\SentryFactory',
    ],
];
