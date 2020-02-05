<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 *
 */
class User implements UserInterface
{
    /**
     * @var integer
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $fullName;
    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    private $email;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $password;
    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     */
    private $registeredAt;
    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isReviewer;

    /**
     * User constructor.
     * @param string $fullName
     * @param string $email
     */
    public function __construct(string $fullName, string $email)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->isReviewer = false;
        $this->registeredAt = new \DateTimeImmutable('now');
    }

    public function changePassword(string $newPassword, UserPasswordEncoderInterface $encoder)
    {
        $this->password = $encoder->encodePassword($this, $newPassword);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getRegisteredAt(): \DateTimeImmutable
    {
        return $this->registeredAt;
    }

    /**
     * @return bool
     */
    public function isReviewer(): bool
    {
        return $this->isReviewer;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param \DateTimeImmutable $registeredAt
     */
    public function setRegisteredAt(\DateTimeImmutable $registeredAt): void
    {
        $this->registeredAt = $registeredAt;
    }

    /**
     * @param bool $isReviewer
     */
    public function setIsReviewer(bool $isReviewer): void
    {
        $this->isReviewer = $isReviewer;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
       return ['ROLE_USER'];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
       return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // noop
    }
}
