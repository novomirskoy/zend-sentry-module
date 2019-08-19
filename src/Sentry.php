<?php

namespace Novomirskoy\SentryModule;

use Exception;
use Raven_Client as RavenClient;
use Raven_ErrorHandler as RavenErrorHandler;

/**
 * Class Sentry
 * @package Novomirskoy\SentryModule
 */
final class Sentry
{
    /**
     * @var RavenClient
     */
    private $ravenClient;

    /**
     * @var RavenErrorHandler
     */
    private $ravenErrorHandler;

    /**
     * Sentry constructor.
     * @param RavenClient $ravenClient
     */
    public function __construct(RavenClient $ravenClient)
    {
        $this->ravenClient = $ravenClient;
        $this->ravenErrorHandler = new RavenErrorHandler($ravenClient);
    }

    /**
     * @param bool $callExistingHandler
     *
     * @return $this
     */
    public function registerExceptionHandler($callExistingHandler = true)
    {
        $this->ravenErrorHandler->registerExceptionHandler($callExistingHandler);

        return $this;
    }

    /**
     * @param bool $callExistingHandler
     * @param int $errorReporting
     *
     * @return $this
     */
    public function registerErrorHandler($callExistingHandler = true, $errorReporting = E_ALL)
    {
        $this->ravenErrorHandler->registerErrorHandler($callExistingHandler, $errorReporting);

        return $this;
    }

    /**
     * @param int $reservedMemorySize
     *
     * @return $this
     */
    public function registerShutdownFunction($reservedMemorySize = 10)
    {
        $this->ravenErrorHandler->registerShutdownFunction($reservedMemorySize);

        return $this;
    }

    /**
     * @param Exception $exception
     * @param array $data
     *
     * @return $this
     */
    public function captureException(Exception $exception, array $data = [])
    {
        $this->ravenClient->captureException($exception, $data);

        return $this;
    }
}
