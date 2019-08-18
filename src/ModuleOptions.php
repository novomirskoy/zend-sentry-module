<?php

namespace Novomirskoy\SentryModule;

use Zend\Stdlib\AbstractOptions;

/**
 * Class ModuleOptions
 * @package Novomirskoy\SentryModule
 */
final class ModuleOptions extends AbstractOptions
{
    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var bool
     */
    private $handleExceptions;

    /**
     * @var bool
     */
    private $handleErrors;

    /**
     * @var bool
     */
    private $handleShutdownErrors;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var array
     */
    private $ravenConfig;

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return ModuleOptions
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHandleExceptions()
    {
        return $this->handleExceptions;
    }

    /**
     * @param bool $handleExceptions
     * @return ModuleOptions
     */
    public function setHandleExceptions($handleExceptions)
    {
        $this->handleExceptions = $handleExceptions;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHandleErrors()
    {
        return $this->handleErrors;
    }

    /**
     * @param bool $handleErrors
     * @return ModuleOptions
     */
    public function setHandleErrors($handleErrors)
    {
        $this->handleErrors = $handleErrors;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHandleShutdownErrors()
    {
        return $this->handleShutdownErrors;
    }

    /**
     * @param bool $handleShutdownErrors
     * @return ModuleOptions
     */
    public function setHandleShutdownErrors($handleShutdownErrors)
    {
        $this->handleShutdownErrors = $handleShutdownErrors;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return ModuleOptions
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return array
     */
    public function getRavenConfig()
    {
        return $this->ravenConfig;
    }

    /**
     * @param array $ravenConfig
     * @return ModuleOptions
     */
    public function setRavenConfig($ravenConfig)
    {
        $this->ravenConfig = $ravenConfig;
        return $this;
    }
}
