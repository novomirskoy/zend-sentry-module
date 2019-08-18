<?php

namespace Novomirskoy\SentryModule\Container;

use Novomirskoy\SentryModule\ModuleOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ModuleOptionsFactory
 * @package Novomirskoy\SentryModule\Container
 */
final class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        return new ModuleOptions($config['sentry']);
    }
}
