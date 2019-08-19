<?php

namespace Novomirskoy\SentryModule;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package Novomirskoy\SentryModule
 */
final class Module implements
    BootstrapListenerInterface,
    ServiceProviderInterface,
    ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     *
     * @param EventInterface|MvcEvent $e
     */
    public function onBootstrap(EventInterface $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $events = $e->getApplication()->getEventManager();

        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $serviceManager->get('Novomirskoy\SentryModule\ModuleOptions');

        if (!$moduleOptions->isEnabled()) {
            return;
        }

        /** @var Sentry $sentry */
        $sentry = $serviceManager->get('Novomirskoy\SentryModule\Sentry');

        if ($moduleOptions->isHandleExceptions()) {
            $sentry->registerExceptionHandler($moduleOptions->isCallExistingExceptionHandler());

            $events->getSharedManager()->attach(
                '*',
                'logException',
                static function (EventInterface $event) use ($sentry) {
                    $exception = $event->getParam('exception');
                    $tags = $event->getParam('tags', []);

                    return $sentry->captureException($exception, ['tags' => $tags]);
            });
        }

        if ($moduleOptions->isHandleErrors()) {
            $sentry->registerErrorHandler(
                $moduleOptions->isCallExistingErrorHandler(),
                $moduleOptions->getErrorReporting()
            );
        }

        if ($moduleOptions->isHandleShutdownErrors()) {
            $sentry->registerShutdownFunction();
        }
    }

    /**
     * @inheritDoc
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/config/service.config.php';
    }

    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
