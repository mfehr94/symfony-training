<?php

declare(strict_types=1);

namespace App\Contact;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class ContactHandler
{
    /**
     * @var string
     */
    private $recipient;
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function handleNewMessage(Message $message): void
    {
        // Todo: save message.
        $this->dispatcher->dispatch(new FormSubmittedEvent($message));
    }
}
