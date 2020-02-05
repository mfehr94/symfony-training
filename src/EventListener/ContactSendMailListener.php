<?php


namespace App\EventListener;


use App\Contact\FormSubmittedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactSendMailListener implements EventSubscriberInterface
{

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var string
     */
    private $recipient;

    public function __construct(MailerInterface $mailer, string $recipient)
    {
        $this->mailer = $mailer;
        $this->recipient = $recipient;
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

    public function onNewMessage(FormSubmittedEvent $event): void
    {
        $message = $event->getMessage();

        $email = (new Email())
            ->subject('New contact message')
            ->from($message->sender)
            ->to($this->recipient)
            ->text($message->content);

        $this->mailer->send($email);
    }
}
