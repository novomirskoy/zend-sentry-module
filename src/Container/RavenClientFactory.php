<?php

namespace Novomirskoy\SentryModule\Container;

use Novomirskoy\SentryModule\Exception\RuntimeException;
use Novomirskoy\SentryModule\ModuleOptions;
use Raven_Client as RavenClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class RavenClientFactory
 * @package Novomirskoy\SentryModule\Container
 */
final class RavenClientFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Novomirskoy\SentryModule\ModuleOptions');

        $apiKey = $moduleOptions->getApiKey();

        if (empty($apiKey)) {
            throw new RuntimeException('Missing Sentry API key');
        }

        return new RavenClient($apiKey, $moduleOptions->getRavenConfig());
    }
}
