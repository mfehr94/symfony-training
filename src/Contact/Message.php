<?php

declare(strict_types=1);

namespace App\Contact;

use Symfony\Component\Validator\Constraints as Assert;

class Message
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $subject;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Email(mode="strict")
     */
    public $sender;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $content;
}
