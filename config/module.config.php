<?php

return [
    'sentry' => [
        'enabled' => false,

        'handleExceptions' => true,
        'handleErrors' => true,
        'handleShutdownErrors' => true,

        'errorReporting' => -1,
        'callExistingExceptionHandler' => true,
        'callExistingErrorHandler' => true,

        'apiKey' => '',

        'ravenConfig' => [],
    ],
];
