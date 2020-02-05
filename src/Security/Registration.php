<?php


namespace App\Security;


use App\Validator\UniqueField;
use Symfony\Component\Validator\Constraints as Assert;

class Registration
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/^[A-Za-z\-\s]+$/")
     */
    public $fullName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     * @UniqueField(entity="App\Entity\User", property="email")
     */
    public $email;

    /**
     * @var
     * @Assert\NotBlank()
     * @Assert\Length(min="8")
     */
    public $rawPassword;

    /**
     * @Assert\IsTrue(message="Your password must not contain your email")
     */
    public function isEmailNotInPassword(): bool
    {
        if (empty($this->rawPassword)) {
            return true;
        }

        return false === stripos($this->rawPassword, $this->email);
    }
}
