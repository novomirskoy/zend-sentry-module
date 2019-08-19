<?php

namespace Novomirskoy\SentryModule\Container;

use Novomirskoy\SentryModule\Sentry;
use Raven_Client as RavenClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SentryFactory
 * @package Novomirskoy\SentryModule\Container
 */
final class SentryFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var RavenClient $ravenClient */
        $ravenClient = $serviceLocator->get('RavenClient');

        return new Sentry($ravenClient);
    }
}