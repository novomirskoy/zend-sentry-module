<?php

namespace Novomirskoy\SentryModule\Log\Writer;

use Zend\Log\Writer\AbstractWriter;
use Raven_Client as Raven;

/**
 * Class Sentry
 * @package Novomirskoy\SentryModule\Log\Writer
 */
final class Sentry extends AbstractWriter
{
    /**
     * @var Raven
     */
    private $raven;

    /**
     * @var array
     */
    private $logLevels = [
        'DEBUG' => Raven::DEBUG,
        'INFO' => Raven::INFO,
        'NOTICE' => Raven::INFO,
        'WARN' => Raven::WARNING,
        'ERR' => Raven::ERROR,
        'CRIT' => Raven::FATAL,
        'ALERT' => Raven::FATAL,
        'EMERG' => Raven::FATAL,
    ];

    /**
     * @inheritDoc
     */
    public function __construct(Raven $raven, $options = null)
    {
        $this->raven = $raven;
        parent::__construct($options);
    }

    /**
     * @inheritDoc
     */
    protected function doWrite(array $event)
    {
        $extra = [];
        //@todo wtf?
        $extra['timestamp'] = $event['timestamp'];

        $eventId = $this
            ->raven
            ->captureMessage(
                $event['message'],
                [],
                $this->logLevels[$event['priorityName']],
                false,
                $event['extra']
            )
        ;

        return $eventId;
    }
}
