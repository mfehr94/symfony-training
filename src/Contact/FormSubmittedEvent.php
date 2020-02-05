<?php


namespace App\Contact;


use Symfony\Contracts\EventDispatcher\Event;

class FormSubmittedEvent extends Event
{
    /**
     * @var Message
     */
    private $message;

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return $this->message;
    }

    /**
     * FormSubmittedEvent constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
}
