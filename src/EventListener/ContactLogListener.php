<?php


namespace App\EventListener;


use App\Contact\FormSubmittedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ContactLogListener implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onNewMessage(FormSubmittedEvent $event): void
    {
        $this->logger->info('New contact form submission', [$event->getMessage()]);
    }


    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            FormSubmittedEvent::class => 'onNewMessage'
        ];
    }
}
