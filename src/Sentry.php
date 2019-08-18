<?php

namespace Novomirskoy\SentryModule;

use Raven_Client as RavenClient;

final class Sentry
{
    /**
     * @var RavenClient
     */
    private $ravenClient;

    public function __construct(RavenClient $ravenClient)
    {
        $this->ravenClient = $ravenClient;
    }
}
